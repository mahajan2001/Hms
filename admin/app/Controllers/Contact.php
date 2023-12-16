<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

class Contact extends MyController
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

    //Views

    public function index()
    {
        $model = new Sitefunction();
        $this->dataModule['contactus'] = $model->get_all_rows(TBL_CONTACT_US, '*');
        echo view('contactus/index', $this->dataModule);
    }
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
            $updateResult = $model->update_data(TBL_CONTACT_US, $data_array,  array('id' => $id));
            $model = new Sitefunction();
            $name = $model->get_single_row(TBL_CONTACT_US, '*', array('id' => $id));
            $stat = "";
            if ($status == 1) {
                $stat = "Available";
            } else {
                $stat = "Unavailable";
            }
            if ($updateResult) {
                $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' changed status of Contact-Us ' . $name['contactus_name'] . ' to ' . $stat;
                $this->addMemberlog($action);
                $data = array(
                    'message' => 'Contact-Us status updated Successfully '
                );
                $this->dataModule = $this->success($data);
            }
        } else {
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }
}
