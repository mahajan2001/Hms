<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Subadmin extends MyController
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
    //view all subadmins

    public function index()
    {
        $model = new Sitefunction();
        $this->dataModule['subadmin'] = $model->get_all_rows(TBL_MEMBERS, '*', array('member_id' => 1));
        echo view('subadmin/index', $this->dataModule);
    }

    //add new subadmin view 

    public function add()
    {
        echo view('subadmin/add', $this->dataModule);
    }

    //edit subadmin details view

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
        $this->dataModule['subadmin'] = $result;
        echo view('subadmin/edit', $this->dataModule);
    }


    //API's

    //add new subadmin
    //add new subadmin

    public function addSubadmin()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->subadmin_name;
        $email = $requestData->subadmin_email;
        $contact = $requestData->subadmin_contact;
        $address = $requestData->subadmin_address;
        $password = $requestData->subadmin_password;
        $adminId = $this->verify();
        if ($adminId != -1) {
            $model = new Sitefunction();
            $resultCount = $model->get_all_rows(TBL_MEMBERS, '*', array('member_email' => strtolower($email)));
            $model = new Sitefunction();
            $resultCountContact =  $model->get_all_rows(TBL_MEMBERS, '*', array('member_contact' => $contact));
            $encryptedPassword = $this->encrypt_password($password);
            if (empty($resultCount) && empty($resultCountContact)) {
                $model = new Sitefunction();
                $data = array(
                    'member_name' => $name,
                    'member_email' => strtolower($email),
                    'member_contact' => $contact,
                    'member_id' => 1,
                    'member_address' => $address,
                    'member_password' =>  $encryptedPassword,
                    'status' => 1,
                    'created' => $this->utc_time,
                    'updated' => $this->utc_time,
                );
                $model = new Sitefunction();
                $model->protect(false);
                $addresult = $model->insert_data(TBL_MEMBERS, $data);

                if ($addresult) {
                    $subject = 'Account Registered';
                    $body = 'Your account is registered successfully. Please use below details to login to your account. <br> <br> <b>Email: </b>' . strtolower($email) . '<br> <b>Password: </b>' . $password;
                    $this->sendmailtouser(strtolower($email), $subject, $body);
                    $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' added sub admin name ' . $name;
                    $this->addMemberlog($action);
                    $data = array(
                        'message' => 'Subadmin added successfully',
                    );
                    $this->dataModule = $this->success($data);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(308)['error']['message']);
                $this->dataModule = $this->failure(308);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    //edit subadmin 

    public function editSubadmin()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->subadmin_name;
        $email = $requestData->subadmin_email;
        $contact = $requestData->subadmin_contact;
        $address = $requestData->subadmin_address;
        $adminId = $this->verify();
        if ($adminId != -1) {
            $model = new Sitefunction();
            $resultCount = $model->get_single_row(TBL_MEMBERS, '*', array('member_email' => strtolower($email), 'id !=' => $id));
            $model = new Sitefunction();
            $resultCountContact =  $model->get_single_row(TBL_MEMBERS, '*', array('member_contact' => $contact, 'id !=' => $id));
            if (empty($resultCount) && empty($resultCountContact)) {
                $dataarray = array(
                    'member_name' => $name,
                    'member_email' => strtolower($email),
                    'member_contact' => $contact,
                    'member_address' => $address,
                    'status' => 1,
                    'updated' => $this->utc_time
                );
                $model = new Sitefunction();
                $model->protect(false);
                $addresult = $model->update_data(TBL_MEMBERS, $dataarray, array('id' => $id));
                if ($addresult) {
                    $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' Updated details of Sub admin name ' . $name;
                    $this->addMemberlog($action);
                    $data = array(
                        'message' => 'Sub admin details updated Successfully '
                    );
                    $this->dataModule = $this->success($data);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(308)['error']['message']);
                $this->dataModule = $this->failure(308);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    //change subadmin status
    public function change_visibility()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $adminId = $this->verify();
        if ($adminId != -1) {
            $model = new Sitefunction();
            $model->protect(false);
            $data_array = array('status' => $status, 'updated' => $this->utc_time);
            $model->update_data(TBL_MEMBERS, $data_array,  array('id' => $id));
            $model = new Sitefunction();
            $name = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
            $stat = "";
            if ($status == 1) {
                $stat = "Available";
            } else {
                $stat = "Unavailable";
            }
            $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' changed status of Sub admin ' . $name['member_name'] . ' to ' . $stat;
            $this->addMemberlog($action);
            $data = array(
                'message' => 'Sub admin status updated Successfully '
            );
            $this->dataModule = $this->success($data);
        } else {
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }
}
