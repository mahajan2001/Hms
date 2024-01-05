<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class Messcharges extends MyController
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

    public function edit()
    {
        echo view('messcharges/edit', $this->dataModule);
    }
    public function editCharges()
    {
        $requestData = $this->request->getJson();
  
        $type = $requestData->type;
        $breakfast = $requestData->breakfast;
        $lunch = $requestData->lunch;
        $dinner = $requestData->dinner;
        $all_day = $requestData->all_day;
        
        $model = new Sitefunction();
        $fetch_student_records = $model->get_all_rows(TBL_USER_REGISTRATION, '*', array('course_type' => $course_type),array(),array('id' => 'DESC'));

        // if(sizeof($fetch_student_records) > 0){
        //     $student_id = ++$fetch_student_records[0]['student_id'];
        // }else{
        //     $student_id = $course_type . substr(date("Y"), -2) . '000001';
        // }

        $data = array(

            'type' => $type,
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
            'all_day' => $all_day,

        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_MESS_CHARGES, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Student details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }


}