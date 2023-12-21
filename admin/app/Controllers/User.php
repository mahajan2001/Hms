<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

ini_set("SMTP", "localhost");
ini_set("smtp_port", "25");
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
       // $image =  $requestData->image;
       // $signature =  $requestData->signature;
        $ole_name = $requestData->ole_name;
        $course_name = $requestData->course_name;
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
           // 'image' =>$image,
           // 'signature' =>$signature,
            'ole_name' => $ole_name,
            'course_name'=>$course_name,
            'course_type' => $course_type,
            'academic_year' => $academic_year,
            'diat_dep_name' => $diat_dep_name,
            'reg_no' => $reg_no,
            'status' => 0,
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
       // $image =  $requestData->image;
       // $signature =  $requestData->signature;
        $ole_name = $requestData->ole_name;
        $course_name = $requestData->course_name;
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
           // 'image' =>$image,
           // 'signature' =>$signature,
            'ole_name' => $ole_name,
            'course_name'=>$course_name,
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


    public function view($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_USER_REGISTRATION, '*', array('id' => $id));
        $this->dataModule['studentView'] = $result;
        echo view('user/view', $this->dataModule);
    }

    public function change_visibility()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_USER_REGISTRATION, '*', array('id' => $id));
        
        if($status == 1){
            
            $model = new Sitefunction();
            $transaction_result = $model->get_single_row(TBL_TRANSACTION, '*', array('student_id' => $result['student_id']));
            if(sizeof($transaction_result) == 0){

            // $generatedPassword = $this->generateRandomPassword();
            // $to = $result['gmail'];
            // $subject = "Login Credentials";
            // $message = "Your Registration is successfull. Below are your login credentials<br> Email: ".$to." <br>Password: ". $generatedPassword . "";
            // $headers = "From: demo45547@gmail.com";
            // $model = new Sitefunction();
            // $model->protect(false);
            // $data_array = array('password' => $this->encrypt_password($generatedPassword), 'updated_at' => $this->utc_time);
            // $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $id));
            // mail($to, $subject, $message, $headers);


            // $this->sendmailtouser($to, $subject, $message);
                if($result['gender'] == 'M'){
                    
                    //Ganga and Yamuna

                    $model = new Sitefunction();
                    $join = array(
                        TBL_BEDS . ' as b' => 'b.room_id=r.id',
                    );
                    $whereCommon = array(
                        'r.hostel_id' => 1, 
                        'b.is_available' => 1
                    );
                    $whereBoys = array_merge($whereCommon, array('r.block' => array('B', 'C')));
                    $fetch_room_boys  = $model->get_all_rows(TBL_ROOM . ' as r', 'b.*,r.hostel_id', $whereBoys, $join);


                    if(sizeof($fetch_room_boys) > 0){

                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->update_data(TBL_BEDS, array('student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $fetch_room_boys[0]['id']));
                        
                        $currentDate = new \DateTime();
                        $currentDate->modify('+6 months');
                     
                        $data_to_insert = array(
                            'student_id' => $result['student_id'],
                            'bed_id' => $fetch_room_boys[0]['id'],
                            'start_date' => $this->utc_time,
                            'end_date' => $currentDate->format('Y-m-d'),
                            'status' => 1,
                            'updated' => $this->utc_time
                        );

                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->insert_data(TBL_TRANSACTION, $data_to_insert);

                        $model = new Sitefunction();
                        $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_boys[0]['hostel_id']));

                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_boys[0]['hostel_id']));
                    }
                    
                ////belowcode
                    
                }else if($result['gender'] == 'F'){
                    //Ganga A Block
                    //Fetch Ganga A block beds
                    $model = new Sitefunction();
                    $join = array(
                        TBL_BEDS . ' as b' => 'b.room_id=r.id',
                    );  
                    $where = array(
                        'r.hostel_id' => 1,
                        'r.block' => 'A',
                        'b.is_available' => 1
                    );
                    $fetch_room_girls = $model->get_all_rows(TBL_ROOM . ' as r', 'b.*,r.hostel_id', $where,$join);
                    // echo json_encode($fetch_room_girls);
                    if(sizeof($fetch_room_girls) > 0){

                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->update_data(TBL_BEDS, array('student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $fetch_room_girls[0]['id']));

                        
                        $currentDate = new \DateTime();
                        $currentDate->modify('+6 months');

                        $data_to_insert = array(
                            'student_id' => $result['student_id'],
                            'bed_id' => $fetch_room_girls[0]['id'],
                            'start_date' => $this->utc_time,
                            'end_date' => $currentDate->format('Y-m-d'),
                            'status' => 1,
                            'updated' => $this->utc_time
                        );
                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->insert_data(TBL_TRANSACTION, $data_to_insert);

                        $model = new Sitefunction();
                        $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_girls[0]['hostel_id']));

                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_girls[0]['hostel_id']));
                    }
                }
            }
            
        }
        // $model = new Sitefunction();
        // $model->protect(false);
        // $data_array = array('status' => $status, 'updated_at' => $this->utc_time);
        // $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Student status updated Successfully '
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }

    // public function test(){

        // $room_no = '1';
        // $bed_no = 'B0001';
        // $floorType = '0';
        // $no_of_beds = '3';
        // for($i = 1; $i <= 79; $i++){
        //     if($i == 16){
        //         $floorType = '1';
        //         $no_of_beds = '2';
        //         $room_no = '101';
        //     } else if($i == 32){
        //         $floorType = '2';
        //         $room_no = '201';
        //     }else if($i == 48){
        //         $floorType = '3';
        //         $room_no = '301';
        //     }else if($i == 64){
        //         $floorType = '4';
        //         $room_no = '401';
        //     }

        //     $insertArray = array(
        //         'room_no' => $room_no,
        //         'hostel_id' => '1',
        //         'block' => 'A',
        //         'floor_type' => $floorType,
        //         'no_of_beds' => $no_of_beds,
        //     );

        //     $model = new Sitefunction();
        //     $model->protect(false);
        //     $insertId = $model->insert_data(TBL_ROOM, $insertArray);
        //     ++$room_no;

        //     for($j = 1; $j <= $no_of_beds; $j++){
        //         $insertArray = array(
        //             'bed_no' => $bed_no,
        //             'room_id' => $insertId,
        //             'is_available' => '1',
        //         );
    
        //         $model = new Sitefunction();
        //         $model->protect(false);
        //         $model->insert_data(TBL_BEDS, $insertArray);
        //         ++$bed_no;
        //     }
        // }

        // $room_no = '101';
        // $bed_no = 'B0001';
        // $floorType = '1';
        // $no_of_beds = '1';
        // for($i = 1; $i <= 48; $i++){
        //     if($i == 13){
        //         $floorType = '2';
        //         $room_no = '201';
        //     } else if($i == 25){
        //         $floorType = '3';
        //         $room_no = '301';
        //     }else if($i == 37){
        //         $floorType = '4';
        //         $room_no = '401';
        //     }

        //     $insertArray = array(
        //         'room_no' => $room_no,
        //         'hostel_id' => '4',
        //         'floor_type' => $floorType,
        //         'no_of_beds' => $no_of_beds,
        //     );

        //     $model = new Sitefunction();
        //     $model->protect(false);
        //     $insertId = $model->insert_data(TBL_ROOM, $insertArray);
        //     ++$room_no;

        //     for($j = 1; $j <= $no_of_beds; $j++){
        //         $insertArray = array(
        //             'bed_no' => $bed_no,
        //             'room_id' => $insertId,
        //             'is_available' => '1',
        //         );
    
        //         $model = new Sitefunction();
        //         $model->protect(false);
        //         $model->insert_data(TBL_BEDS, $insertArray);
        //         ++$bed_no;
        //     }
        // }
    // }


    


    

}