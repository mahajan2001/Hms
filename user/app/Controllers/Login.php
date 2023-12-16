<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class Login extends MyController
{
    use ResponseTrait;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->utc_time = date('Y-m-d H:i:s');
        $this->utc_date = date('Y-m-d');
        $this->dataModule = array();
        $this->dataModule['controller'] = $this;
    }

    //Admin Login
    
    public function index()
    {
        $model = new Sitefunction();
        $this->dataModule['project'] = $model->get_single_row(TBL_MASTER_SETTINGS, '*');
        echo view('login/index', $this->dataModule);
    }

    public function login()
    {
        $requestData = $this->request->getJson();
        $adminemail = $requestData->admin_email;
        $adminpassword = $requestData->admin_password;
        if (!empty($adminemail) && !empty($adminpassword)) {
            $model = new Sitefunction();
            $admin_find = $model->get_single_row(TBL_USER_REGISTRATION, '*', array('gmail' => strtolower($adminemail), 'status' => 1));
            if (!empty($admin_find)) {
                $storepass = $admin_find['password'];
                if ($this->verify_password($adminpassword, $storepass)) {
                    $this->session->set('admin_id', strval($admin_find["id"]));
                    $this->session->set('admin_name', $admin_find["name"]);
                    $dataArray = array(
                        'adminId' =>  $admin_find["id"],
                        'email' => $adminemail,
                        'contact' => $admin_find["mobile_no"],
                    );
                    $key = $this->getKey();
                    $iat = time(); // current timestamp value
                    $nbf = $iat;
                    $exp = $iat + (30 * 86400);
                    $alg = 'HS256';
                    $payload = array(
                        "iss" => "The_claim",
                        "aud" => "The_Aud",
                        "iat" => $iat, // issued at
                        "nbf" => $nbf, //not before in seconds
                        "exp" => $exp, // expire time in seconds
                        "data" => $admin_find["id"],
                    );
                    $token = JWT::encode($payload, $key, $alg);
                    $dataArray['token'] = $token;
                    $this->session->set('jwtToken', $token);
                    $this->dataModule = $this->success($dataArray);
                } else {
                    $this->session->setFlashdata('error', $this->failure(300)['error']['message']);
                    $this->dataModule = $this->failure(300);
                }
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
            $this->dataModule = $this->failure(303);
        }
        return $this->respond($this->dataModule);
    }

    //Admin logout

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(LOGIN_PATH);
    }
}
