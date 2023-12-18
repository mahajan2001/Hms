<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class Room extends MyController
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
        $this->dataModule['room'] = $model->get_all_rows(TBL_HOSTEL, '*');

       
        echo view('room/addroom', $this->dataModule);  
    }
    

    public function blockdata()
    {
        $requestData = $this->request->getPost();
        $hostel_name = $requestData['hostel_name'];
        $model = new Sitefunction();
        $block = $model->get_all_rows(TBL_BLOCK, '*' , array('hostel_id' => $hostel_name));
        echo json_encode($block);
    }
  
   /* public function addroom()
    {
        $requestData = $this->request->getJson();
        $hostel_name = $requestData->hostel_name;
        $hostel_block = $requestData->hostel_block;
        $hostel_floor = $requestData->hostel_floor;
        $no_of_bed = $requestData->no_of_bed;
       
       

        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'dob' => $dob,
            'student_id' => $student_id,
            'gender' => $gender,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_USER_REGISTRATION, $data);
        if ($addresult) {
            // $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added student with name ' . $name;
            // $this->addMemberlog($action);
            $data = array(
                'message' => 'Student added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

*/
    
    
}