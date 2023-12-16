<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

class Master extends MyController
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

    public function index()
    {
        $model = new Sitefunction();
        $this->dataModule['master'] = $model->get_single_row(TBL_MASTER_SETTINGS, '*', array('id' => 1));
        echo view('master/index', $this->dataModule);
    }

    public function edit($id)
    {
        $model = new Sitefunction();
        $this->dataModule['master'] = $model->get_single_row(TBL_MASTER_SETTINGS, '*', array('id' => $id));
        echo view('master/edit', $this->dataModule);
    }

    public function editProject()
    {
        $requestData = $_POST;
        $id = $requestData['id'];
        $project_name = $requestData['project_name'];
        $address = $requestData['address'];
        $adminId = $this->verify();
        if ($adminId != -1) {
            $taskArray = array();
            if (isset($_FILES['project_image']) && !empty($_FILES['project_image'])) {
                $randdom = round(microtime(time() * 1000)) . rand(000, 999);
                $file_extension1 = pathinfo($_FILES['project_image']["name"], PATHINFO_EXTENSION);
                $file_name1 = $randdom . '.' . $file_extension1;
                if ($_FILES['project_image']["error"] <= 0) {
                    move_uploaded_file($_FILES['project_image']['tmp_name'], IMAGE_UPLOAD_PATH . $file_name1);
                    $taskArray['project_logo'] = $file_name1;
                }
            } else {
                // $taskArray['project_logo'] = 'NA';
            }
            $taskArray['project_name'] = $project_name;
            $taskArray['address'] = $address;
            $taskArray['status'] = 1;
            $taskArray['updated'] = $this->utc_time;

            $model = new Sitefunction();
            $model->protect(false);
            $insertCheck = $model->update_data(TBL_MASTER_SETTINGS, $taskArray, array('id' => $id));
            if ($insertCheck) {
                $action = 'Admin ID ' . $adminId . ' name ' . $this->session->get('admin_name') . ' updated project details to project name ' . $project_name;
                $this->addMemberlog($action);
                $data = array(
                    'message' => 'Project details updated successfully',
                );
                $this->dataModule = $this->success($data);
            } else {
                $this->dataModule = $this->failure(309);
            }
        } else {
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }
}
