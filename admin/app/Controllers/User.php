<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class User extends MyController
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
        $this->dataModule['students'] = $model->get_all_rows(TBL_USER_REGISTRATION, '*');
        echo view('user/index', $this->dataModule);
    }

    public function registration()
    {
        echo view('user/registration', $this->dataModule);  
    }


    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_USER_REGISTRATION, '*', array('id' => $id));
        $this->dataModule['students'] = $result;
        echo view('user/edit', $this->dataModule);
    }

    public function addstudentdata()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->name;
        $dob = $requestData->dob;
        $gender = $requestData->gender;
        $blood_group = $requestData->blood_group;
        $address = $requestData->address;
        $permanent_address = $requestData->permanent_address;
        $postal_code = $requestData->postal_code;
        $mobile_no = $requestData->mobile_no;
        $parent_mobile = $requestData->parent_mobile;
        $landline = $requestData->landline;
        $gmail = $requestData->gmail;
        $dl_no = $requestData->dl_no;
        $pd_no = $requestData->pd_no;
        $aadhar_no = $requestData->aadhar_no;
        $image =  $requestData->image;
        $signature =  $requestData->signature;
        $ole_name = $requestData->ole_name;
        $course_type = $requestData->course_type;
        $academic_year = $requestData->academic_year;
        $diat_dep_name = $requestData->diat_dep_name;
        $reg_no = $requestData->reg_no;
        
        $model = new Sitefunction();
        $fetch_student_records = $model->get_all_rows(TBL_USER_REGISTRATION, '*', array('course_type' => $course_type),array(),array('id' => 'DESC'));

        if(sizeof($fetch_student_records) > 0){
            $student_id = ++$fetch_student_records[0]['student_id'];
        }else{
            $student_id = $course_type . substr(date("Y"), -2) . '000001';
        }

        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'dob' => $dob,
            'student_id' => $student_id,
            'gender' => $gender,
            'blood_group' => $blood_group,
            'address' => $address,
            'permanent_address'=>$permanent_address,
            'postal_code' => $postal_code,
            'mobile_no' => $mobile_no,
            'parent_mobile' => $parent_mobile,
            'landline' => $landline,
            'gmail'=>$gmail,
            'dl_no' => $dl_no,
            'pd_no' => $pd_no,
            'aadhar_no' => $aadhar_no,
            'image' =>$image,
            'signature' =>$signature,
            'ole_name' => $ole_name,
            'course_type' => $course_type,
            'academic_year' => $academic_year,
            'diat_dep_name' => $diat_dep_name,
            'reg_no' => $reg_no,
            'status' => 1,
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


    public function editstudent()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $dob = $requestData->dob;
        $gender = $requestData->gender;
        $blood_group = $requestData->blood_group;
        $address = $requestData->address;
        $permanent_address = $requestData->permanent_address;
        $postal_code = $requestData->postal_code;
        $mobile_no = $requestData->mobile_no;
        $parent_mobile = $requestData->parent_mobile;
        $landline = $requestData->landline;
        $gmail = $requestData->gmail;
        $dl_no = $requestData->dl_no;
        $pd_no = $requestData->pd_no;
        $aadhar_no = $requestData->aadhar_no;
        $image =  $requestData->image;
        $signature =  $requestData->signature;
        $ole_name = $requestData->ole_name;
        $course_type = $requestData->course_type;
        $academic_year = $requestData->academic_year;
        $diat_dep_name = $requestData->diat_dep_name;
        $reg_no = $requestData->reg_no;
        $model = new Sitefunction();
        $fetch_student_records = $model->get_all_rows(TBL_USER_REGISTRATION, '*', array('course_type' => $course_type),array(),array('id' => 'DESC'));

        if(sizeof($fetch_student_records) > 0){
            $student_id = ++$fetch_student_records[0]['student_id'];
        }else{
            $student_id = $course_type . substr(date("Y"), -2) . '000001';
        }

        $data = array(
            'name' => $name,
            'dob' => $dob,
            'student_id' => $student_id,
            'gender' => $gender,
            'blood_group' => $blood_group,
            'address' => $address,
            'permanent_address'=>$permanent_address,
            'postal_code' => $postal_code,
            'mobile_no' => $mobile_no,
            'parent_mobile' => $parent_mobile,
            'landline' => $landline,
            'gmail'=>$gmail,
            'dl_no' => $dl_no,
            'pd_no' => $pd_no,
            'aadhar_no' => $aadhar_no,
            'image' =>$image,
            'signature' =>$signature,
            'ole_name' => $ole_name,
            'course_type' => $course_type,
            'academic_year' => $academic_year,
            'diat_dep_name' => $diat_dep_name,
            'reg_no' => $reg_no,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_USER_REGISTRATION, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Student details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function change_visibility()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $model = new Sitefunction();
        $model->protect(false);
        $data_array = array('status' => $status, 'updated_at' => $this->utc_time);
        $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Student status updated Successfully '
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }
   

    public function temporary_vacation()
    {
     
        echo view('user/temporatry_vacation', $this->dataModule);
    }


  /*  public function addtemporayvacation()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $dob = $requestData->dob;
        $gender = $requestData->gender;
        $blood_group = $requestData->blood_group;
        $address = $requestData->address;
        $permanent_address = $requestData->permanent_address;
        $postal_code = $requestData->postal_code;
        $mobile_no = $requestData->mobile_no;
        $parent_mobile = $requestData->parent_mobile;
        $landline = $requestData->landline;
        $gmail = $requestData->gmail;
        $dl_no = $requestData->dl_no;
        $pd_no = $requestData->pd_no;
        $aadhar_no = $requestData->aadhar_no;
        $image =  $requestData->image;
        $signature =  $requestData->signature;
        $ole_name = $requestData->ole_name;
        $course_type = $requestData->course_type;
        $academic_year = $requestData->academic_year;
        $diat_dep_name = $requestData->diat_dep_name;
        $reg_no = $requestData->reg_no;
        
        $data = array(
            'name' => $name,
            'dob' => $dob,
            'student_id' => $student_id,
            'gender' => $gender,
            'blood_group' => $blood_group,
            'address' => $address,
            'permanent_address'=>$permanent_address,
            'postal_code' => $postal_code,
            'mobile_no' => $mobile_no,
            'parent_mobile' => $parent_mobile,
            'landline' => $landline,
            'gmail'=>$gmail,
            'dl_no' => $dl_no,
            'pd_no' => $pd_no,
            'aadhar_no' => $aadhar_no,
            'image' =>$image,
            'signature' =>$signature,
            'ole_name' => $ole_name,
            'course_type' => $course_type,
            'academic_year' => $academic_year,
            'diat_dep_name' => $diat_dep_name,
            'reg_no' => $reg_no,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_USER_REGISTRATION, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Student details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }*/
}