<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

use phpFCMv1\Client;
use phpFCMv1\Notification;
use phpFCMv1\Recipient;

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
        
        $model = new Sitefunction();
        $this->dataModule['hostels'] = $model->get_all_rows(TBL_HOSTEL, '*');
        
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
        $check_flag = 0;
        if($status == 1){
            
            // $model = new Sitefunction();
            // $transaction_result = $model->get_single_row(TBL_TRANSACTION, '*', array('student_id' => $result['student_id']));
            // if(sizeof($transaction_result) == 0){
                //Send login credentials to student via mail                
                $model = new Sitefunction();
                $fetch_user_details = $model->get_all_rows(TBL_USER_REGISTRATION , '*', array('id' => $id));
                if($fetch_user_details[0]['first_time_flag'] == 0){
                    $generatedPassword = $this->generateRandomPassword();
                    // $to = $result['gmail'];
                    $to = 'info@test.globalinfocloud.in';
                    $to_mail = $result['gmail'];
                    $subject = "Login Credentials";
                    $message = "Your Registration is successfull. Below are your login credentials - Email: ".$to_mail." , Password: ". $generatedPassword . "";
                    $headers = "From: info@test.globalinfocloud.in";
                    $model = new Sitefunction();
                    $model->protect(false);
                    $data_array = array('password' => $this->encrypt_password($generatedPassword), 'updated_at' => $this->utc_time, 'first_time_flag' => 1);
                    $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $id));
                    mail($to, $subject, $message, $headers);
                    $this->send_fcm_msg($fetch_user_details[0]['fcm_token'], 'User Registration', 'User has been made active, you may login from app');
                    $check_flag = 1;
                    //Room Allocation
                    // if($result['gender'] == 'M'){
                        
                        //Ganga and Krishna
    
                        // $model = new Sitefunction();
                        // $where = array(
                        //     'r.hostel_id' => 1,
                        //     'r.block != ' => 'A',
                        // );
                        // $fetch_room_boys_godavari  = $model->get_all_rows(TBL_ROOM . ' as r', 'r.*', $where);
                        
                        // if(sizeof($fetch_room_boys_godavari) > 0){
                            
                        //     //Check availability of beds in room
                        //     $check_room_flag = true;
                        //     $bed_id = 0;
                        //     for($i = 0; $i < sizeof($fetch_room_boys_godavari); $i++){
                        //         $model = new Sitefunction();
                        //         $fetch_room_availability = $model->get_all_rows(TBL_BEDS , '*', array('room_id' => $fetch_room_boys_godavari[$i]['id'] , 'is_available' => 1));
                        //         if(sizeof($fetch_room_availability) > 0){
                        //             //Bed available in room so break loop and allocate bed id
                        //             $check_room_flag = true;
                        //             $bed_id = $fetch_room_availability[0]['id'];
                        //             break;
                        //         }else{
                        //             $check_room_flag = false;
                        //         }
                        //     }
                        //     if($check_room_flag == true){
                        //         //Bed is available 
                        //         $model = new Sitefunction();
                        //         $model->protect(false);
                        //         $model->update_data(TBL_BEDS, array('is_available' => 0 , 'student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $bed_id));
        
                        //         $currentDate = new \DateTime();
                        //         $currentDate->modify('+6 months');
        
                        //         $data_to_insert = array(
                        //             'student_id' => $result['student_id'],
                        //             'bed_id' => $bed_id,
                        //             'start_date' => $this->utc_time,
                        //             'end_date' => $currentDate->format('Y-m-d'),
                        //             'status' => 1,
                        //             'updated' => $this->utc_time
                        //         );
        
                        //         $model = new Sitefunction();
                        //         $model->protect(false);
                        //         $model->insert_data(TBL_TRANSACTION, $data_to_insert);
        
                        //         $model = new Sitefunction();
                        //         $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_boys_godavari[0]['hostel_id']));
        
                        //         $model = new Sitefunction();
                        //         $model->protect(false);
                        //         $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_boys_godavari[0]['hostel_id']));
                        //     }else{
                        //         //Check for next hostel
                        //         $model = new Sitefunction();
                        //         $where = array(
                        //             'r.hostel_id' => 2,
                        //         );
                        //         $fetch_room_boys_krishna  = $model->get_all_rows(TBL_ROOM . ' as r', 'r.*', $where);
                        //         $check_room_flag = true;
                        //         $bed_id = 0;
                        //         for($i = 0; $i < sizeof($fetch_room_boys_krishna); $i++){
                        //             $model = new Sitefunction();
                        //             $fetch_room_availability = $model->get_all_rows(TBL_BEDS , '*', array('room_id' => $fetch_room_boys_krishna[$i]['id'] , 'is_available' => 1));
                        //             if(sizeof($fetch_room_availability) > 0){
                        //                 //Bed available in room so break loop and allocate bed id
                        //                 $check_room_flag = true;
                        //                 $bed_id = $fetch_room_availability[0]['id'];
                        //                 break;
                        //             }else{
                        //                 $check_room_flag = false;
                        //             }
                        //         }
                        //         if(sizeof($fetch_room_boys_krishna) > 0){
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->update_data(TBL_BEDS, array('is_available' => 0 ,'student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $bed_id));
        
                        //             $currentDate = new \DateTime();
                        //             $currentDate->modify('+6 months');
        
                        //             $data_to_insert = array(
                        //                 'student_id' => $result['student_id'],
                        //                 'bed_id' => $bed_id,
                        //                 'start_date' => $this->utc_time,
                        //                 'end_date' => $currentDate->format('Y-m-d'),
                        //                 'status' => 1,
                        //                 'updated' => $this->utc_time
                        //             );
        
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->insert_data(TBL_TRANSACTION, $data_to_insert);
        
                        //             $model = new Sitefunction();
                        //             $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_boys_krishna[0]['hostel_id']));
        
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_boys_krishna[0]['hostel_id']));
                        //         }
                        //     }
                            
                        // }else{
                        //     $model = new Sitefunction();
                        //     $where = array(
                        //         'r.hostel_id' => 2,
                        //     );
                        //     $fetch_room_boys_krishna  = $model->get_all_rows(TBL_ROOM . ' as r', 'r.*', $where);
                        //     if(sizeof($fetch_room_boys_krishna) > 0){
                        //         $check_room_flag = true;
                        //         $bed_id = 0;
                        //         for($i = 0; $i < sizeof($fetch_room_boys_krishna); $i++){
                        //             $model = new Sitefunction();
                        //             $fetch_room_availability = $model->get_all_rows(TBL_BEDS , '*', array('room_id' => $fetch_room_boys_krishna[$i]['id'] , 'is_available' => 1));
                        //             if(sizeof($fetch_room_availability) > 0){
                        //                 //Bed available in room so break loop and allocate bed id
                        //                 $check_room_flag = true;
                        //                 $bed_id = $fetch_room_availability[0]['id'];
                        //                 break;
                        //             }else{
                        //                 $check_room_flag = false;
                        //             }
                        //         }
                        //         if($check_room_flag == true){
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->update_data(TBL_BEDS, array('is_available' => 0 ,'student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $bed_id));
        
                        //             $currentDate = new \DateTime();
                        //             $currentDate->modify('+6 months');
        
                        //             $data_to_insert = array(
                        //                 'student_id' => $result['student_id'],
                        //                 'bed_id' => $bed_id,
                        //                 'start_date' => $this->utc_time,
                        //                 'end_date' => $currentDate->format('Y-m-d'),
                        //                 'status' => 1,
                        //                 'updated' => $this->utc_time
                        //             );
        
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->insert_data(TBL_TRANSACTION, $data_to_insert);
        
                        //             $model = new Sitefunction();
                        //             $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_boys_krishna[0]['hostel_id']));
        
                        //             $model = new Sitefunction();
                        //             $model->protect(false);
                        //             $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_boys_krishna[0]['hostel_id']));   
                        //         }
                        //     }
                        // }
                    // }else if($result['gender'] == 'F'){
                        //Ganga A Block
                        //Fetch Ganga A block beds
                        // $model = new Sitefunction();
                        // $join = array(
                        //     TBL_BEDS . ' as b' => 'b.room_id=r.id',
                        // );  
                        // $where = array(
                        //     'r.hostel_id' => 1,
                        //     'r.block' => 'A',
                        //     'b.is_available' => 1
                        // );
                        // $fetch_room_girls = $model->get_all_rows(TBL_ROOM . ' as r', 'b.*,r.hostel_id', $where,$join);
    
                        // if(sizeof($fetch_room_girls) > 0){
    
                        //     $model = new Sitefunction();
                        //     $model->protect(false);
                        //     $model->update_data(TBL_BEDS, array('is_available' => 0 ,'student_id' => $result['student_id'] , 'updated' => $this->utc_time), array('id' => $fetch_room_girls[0]['id']));
    
                        //     $currentDate = new \DateTime();
                        //     $currentDate->modify('+6 months');
    
                        //     $data_to_insert = array(
                        //         'student_id' => $result['student_id'],
                        //         'bed_id' => $fetch_room_girls[0]['id'],
                        //         'start_date' => $this->utc_time,
                        //         'end_date' => $currentDate->format('Y-m-d'),
                        //         'status' => 1,
                        //         'updated' => $this->utc_time
                        //     );
    
                        //     $model = new Sitefunction();
                        //     $model->protect(false);
                        //     $model->insert_data(TBL_TRANSACTION, $data_to_insert);
    
                        //     $model = new Sitefunction();
                        //     $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $fetch_room_girls[0]['hostel_id']));
    
                        //     $model = new Sitefunction();
                        //     $model->protect(false);
                        //     $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $fetch_room_girls[0]['hostel_id']));
                        // }
                    // }
                // }   
                }
        }
        $model = new Sitefunction();
        $model->protect(false);
        $data_array = array('status' => $status, 'updated_at' => $this->utc_time);
        $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Student status updated Successfully',
            'check_flag' => $check_flag
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }
    
    public function fetch_allocated_users(){
        $model = new Sitefunction();
        $join = array(
            TBL_BEDS . ' as b' => 'b.id=t.bed_id',
            TBL_ROOM . ' as r' => 'r.id=b.room_id',
            TBL_HOSTEL . ' as h' => 'h.id=r.hostel_id',
        );
        $this->dataModule['allocation_details'] = $model->get_all_rows(TBL_TRANSACTION . ' as t', 't.*,b.bed_no,r.room_no,h.name,r.block' , array(), $join);
        echo view('user/room_allocations', $this->dataModule);
    }
    
    public function fetch_rooms(){
        $requestData = $this->request->getJson();
        $hostel_id = $requestData->hostel_id;
        $model = new Sitefunction();
        $available_rooms = $model->get_all_rows(TBL_ROOM . ' as r', 'r.*' , array('r.hostel_id' => $hostel_id));
        echo json_encode($available_rooms);
    }
    
    public function fetch_rooms_block_wise(){
        $requestData = $this->request->getJson();
        $hostel_id = $requestData->hostel_id;
        $block = $requestData->block;
        $model = new Sitefunction();
        $available_rooms = $model->get_all_rows(TBL_ROOM . ' as r', 'r.*' , array('r.hostel_id' => $hostel_id, 'r.block' => $block));
        echo json_encode($available_rooms);
    }
    
    public function fetch_beds(){
        $requestData = $this->request->getJson();
        $room_id = $requestData->room_id;
        $model = new Sitefunction();
        $available_beds = $model->get_all_rows(TBL_BEDS , '*' , array('room_id' => $room_id, 'is_available' => 1));
        echo json_encode($available_beds);
    }
    
    public function allocate_room(){
        $requestData = $this->request->getJson();
        $bed_id = $requestData->bed_id;
        $user_id = $requestData->user_id;
        $hostel_id = $requestData->hostel_id;
        
        $model = new Sitefunction();
        $fetch_user_details = $model->get_all_rows(TBL_USER_REGISTRATION , '*', array('id' => $user_id));
        
        $model = new Sitefunction();
        $model->protect(false);
        $model->update_data(TBL_BEDS, array('is_available' => 0 ,'student_id' => $fetch_user_details[0]['student_id'] , 'updated' => $this->utc_time), array('id' => $bed_id));
        
        $currentDate = new \DateTime();
        $currentDate->modify('+6 months');

        $data_to_insert = array(
            'student_id' => $fetch_user_details[0]['student_id'],
            'bed_id' => $bed_id,
            'start_date' => $this->utc_time,
            'end_date' => $currentDate->format('Y-m-d'),
            'status' => 1,
            'updated' => $this->utc_time
        );

        $model = new Sitefunction();
        $model->protect(false);
        $model->insert_data(TBL_TRANSACTION, $data_to_insert);
        
        $model = new Sitefunction();
        $fetch_hostel_current_qty = $model->get_all_rows(TBL_HOSTEL , '*', array('id' => $hostel_id));
    
        $model = new Sitefunction();
        $model->protect(false);
        $model->update_data(TBL_HOSTEL, array('total_available_beds' => $fetch_hostel_current_qty[0]['total_available_beds'] - 1), array('id' => $hostel_id));
        
        $model = new Sitefunction();
        $model->protect(false);
        $data_array = array('is_allocated' => 1, 'updated_at' => $this->utc_time);
        $model->update_data(TBL_USER_REGISTRATION, $data_array, array('id' => $user_id));
        
        echo json_encode('success');
    }
    
    public function send_fcm_msg($token, $title, $body){
        $client = new Client(IMAGE_UPLOAD_PATH . 'fcmkey/service_account.json');
        $recipient = new Recipient();
        $notification = new Notification();
        $recipient->setSingleRecipient($token);
        $notification->setNotification($title, $body);
        $client->build($recipient, $notification);
        $response = $client->fire();
        echo $response;
    }
}