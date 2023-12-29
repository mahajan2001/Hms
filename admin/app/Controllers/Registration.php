<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

use phpFCMv1\Client;
use phpFCMv1\Notification;
use phpFCMv1\Recipient;

class Registration extends MyController
{
    
    public function RegistrationForm(){
        
        $requestData = $this->request->getPost();
        $name = $requestData['name'];
        $dob = $requestData['dob'];
        $gender = $requestData['gender'];
        $blood_group = $requestData['blood_group'];
        $address = $requestData['address'];
        $permanent_address = $requestData['permanent_address'];
        $postal_code = $requestData['postal_code'];
        $mobile_no = $requestData['mobile_no'];
        $parent_mobile = $requestData['parent_mobile'];
        $landline = $requestData['landline'];
        $gmail = $requestData['gmail'];
        $dl_no = $requestData['dl_no'];
        $pd_no = $requestData['pd_no'];
        $aadhar_no = $requestData['aadhar_no'];
        $image =  $requestData['image'];
        $signature =  $requestData['signature'];
        $ole_name = $requestData['ole_name'];
        $course_id = $requestData['course_name'];
        $sub_course_id = $requestData['course_type'];
        $academic_year = $requestData['academic_year'];
        $diat_dep_name = $requestData['diat_dep_name'];
        $reg_no = $requestData['reg_no'];
        
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
            $randdom = round(microtime(time() * 1000)) . rand(000, 999);
            $file_extension1 = pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION);
            $file_name1 = $randdom . '.' . $file_extension1;
            if ($_FILES['image']["error"] <= 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_UPLOAD_PATH . 'user/'  . $file_name1);
                $image = $file_name1;
            }
        } else {
            $image = 'NA';
        }
        
        if (isset($_FILES['signature']) && !empty($_FILES['signature'])) {
            $randdom = round(microtime(time() * 1000)) . rand(000, 999);
            $file_extension1 = pathinfo($_FILES['signature']["name"], PATHINFO_EXTENSION);
            $file_name1 = $randdom . '.' . $file_extension1;
            if ($_FILES['signature']["error"] <= 0) {
                move_uploaded_file($_FILES['signature']['tmp_name'], IMAGE_UPLOAD_PATH . 'user/'  . $file_name1);
                $signature = $file_name1;
            }
        } else {
            $signature = 'NA';
        }
        
        $model = new Sitefunction();
        $course_details = $model->get_all_rows(TBL_COURSES, '*', array('id' => $course_id));
        
        $model = new Sitefunction();
        $sub_course_details = $model->get_all_rows(TBL_SUB_COURSES, '*', array('id' => $sub_course_id));
        
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
            'course_name'=>$sub_course_details[0]['name_of_course'],
            'course_type' => $course_details[0]['name'],
            'academic_year' => $academic_year,
            'diat_dep_name' => $sub_course_details[0]['department'],
            'reg_no' => $reg_no,
            'status' => 0,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_USER_REGISTRATION, $data);
        $data = array(
            'message' => 'Student added successfully',
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }
    
    public function getCourseDetails(){
        
        $result = [];
        $model = new Sitefunction();
        $all_courses = $model->get_all_rows(TBL_COURSES , '*');
        for($i = 0; $i < sizeof($all_courses); $i++){
            $model = new Sitefunction();
            $all_sub_courses = $model->get_all_rows(TBL_SUB_COURSES , 'id,name_of_course,department' , array('course_id' => $all_courses[$i]['id']));
            array_push($result, array('id' =>$all_courses[$i]['id'], 'name' =>$all_courses[$i]['name'], 'sub_courses' => $all_sub_courses));
        }
        $this->dataModule = $this->success($result);
        
        return $this->respond($this->dataModule);
    }
    
    public function login(){
        $requestData = $this->request->getJson();
        $email = $requestData->email;
        $password = $requestData->password;
        $fcm_token = $requestData->fcm_token;
        if(($email != '' || $email != null) && ($password != '' || $password != null)){
            $model = new Sitefunction();
            $check_login = $model->get_all_rows(TBL_USER_REGISTRATION, '*', array('gmail' => $email));
            if(sizeof($check_login) > 0){
                if($check_login[0]['status'] == 1){
                    if($this->verify_password($password,$check_login[0]['password'])){
                        
                        $model = new Sitefunction();
                        $join = array(
                            TBL_BEDS . ' as b' => 'b.id=t.bed_id',
                            TBL_ROOM . ' as r' => 'r.id=b.room_id',
                            TBL_HOSTEL . ' as h' => 'h.id=r.hostel_id',
                        );
                        $accomodation_result = $model->get_all_rows(TBL_TRANSACTION . ' as t', 'h.name as hostel_name,r.room_no,b.bed_no', array('t.student_id' => $check_login[0]['student_id']),$join);
                        
                        $model = new Sitefunction();
                        $model->protect(false);
                        $model->update_data(TBL_USER_REGISTRATION, array('fcm_token' => $fcm_token , 'updated_at' => $this->utc_time), array('id' => $check_login[0]));
                        
                        $result = [];
                        $result['id'] = $check_login[0]['id'];
                        $result['student_id'] = $check_login[0]['student_id'];
                        $result['name'] = $check_login[0]['name'];
                        $result['mobile_no'] = $check_login[0]['mobile_no'];
                        $result['course_name'] = $check_login[0]['course_name'];
                        $result['course_type'] = $check_login[0]['course_type'];
                        $result['academic_year'] = $check_login[0]['academic_year'];
                        $result['diat_dep_name'] = $check_login[0]['diat_dep_name'];
                        if(sizeof($accomodation_result) > 0){
                            $result['room_no'] = $accomodation_result[0]['room_no'];
                            $result['bed_no'] = $accomodation_result[0]['bed_no'];
                            $result['hostel_name'] = $accomodation_result[0]['hostel_name'];
                        }else{
                            $result['room_no'] = 'NA';
                            $result['bed_no'] = 'NA';
                            $result['hostel_name'] = 'NA';
                        }
                        $this->dataModule = $this->success($result);
                    }else{
                        $this->dataModule = $this->failure(400, 'Invalid Password');
                    }
                }else{
                    $this->dataModule = $this->failure(400, 'User is Inactive');
                }   
            }else{
                $this->dataModule = $this->failure(400, 'Email doesnt exists');
            }
        }else{
            $this->dataModule = $this->failure(400, 'Email and Password is required');
        }
        return $this->respond($this->dataModule);
    }
    
    // public function
    public function test_fcm(){
        $client = new Client(IMAGE_UPLOAD_PATH . 'fcmkey/service_account.json');
        $recipient = new Recipient();
        $notification = new Notification();
        $recipient->setSingleRecipient('cgkNUmIHRbqfdj5xYie8Ga:APA91bHyQIXNQfKWiSJg8KuY1gjOnYrmJgiYetw0vltrus9MGuDtOhN7aaXQHds9GqhwJjbAH2Zyr4mLJQig0nZVKMFxEB3AfaSZ1Z0HkIKxrT8mB1ONb7lS25HF8ic4xWK97E7aeJcn');
        $notification->setNotification('TEST TITLE', 'NOTIFICATION_BODY');
        $client->build($recipient, $notification);
        $response = $client->fire();
        echo $response;
    }
    
    public function add_temporary_vacation(){
        $requestData = $this->request->getJson();
        $user_id = $requestData->user_id;
        $temporary_vacation_date = $requestData->temporary_vacation_date;
        $deposit = $requestData->deposit;
        $mess_balance = $requestData->mess_balance;
        
        $model = new Sitefunction();
        $check_registration_no = $model->get_all_rows(TBL_TEMPORARY_VACATION , '*' , array(),array(),array('id' => 'DESC'));
        
        if(sizeof($check_registration_no) > 0){
            $registration_no = ++$check_registration_no[0]['registration_no'];
        }else{
            $registration_no = 'TV00001';
        }
        
        $model = new Sitefunction();
        $user_details = $model->get_all_rows(TBL_USER_REGISTRATION , '*' , array('id' => $user_id));
        
        $join = array(
            TBL_BEDS . ' as b' => 'b.id=t.bed_id',
            TBL_ROOM . ' as r' => 'r.id=b.room_id',
        );
        $model = new Sitefunction();
        $accomodation_result = $model->get_all_rows(TBL_TRANSACTION . ' as t', 'r.room_no', array('t.student_id' => $user_details[0]['student_id']),$join);
        
        if(sizeof($accomodation_result) > 0){
            $room_no = $accomodation_result[0]['room_no'];
        }else{
            $room_no = 'NA';
        }
        $model = new Sitefunction();
        $data = array(
            'name' => $user_details[0]['name'],
            'registration_no' => $registration_no,
            'student_id' => $user_details[0]['student_id'],
            'course_type' => $user_details[0]['course_type'],
            'department' => $user_details[0]['diat_dep_name'],
            'joining_date' => $user_details[0]['created_at'],
            'room_no' => $room_no,
            'temporary_vacation_date'=>$temporary_vacation_date,
            'mobile_no' => $user_details[0]['mobile_no'],
            'deposit' => $deposit,
            'mess_balance' => $mess_balance,
            'date_mess'=> $this->utc_time,
            'total_balance' => $deposit + $mess_balance,
            'date_tobalance' => $this->utc_time,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_TEMPORARY_VACATION, $data);
        $data = array(
            'message' => 'Temperorary vacation added successfully',
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }
    
    public function add_permanent_vacation(){
        $requestData = $this->request->getPost();
        $user_id = $requestData['user_id'];
        $permanent_vacation_date = $requestData['permanent_vacation_date'];
        $deposit = $requestData['deposit'];
        $mess_balance = $requestData['mess_balance'];
        $account_name= $requestData['account_name'];
        $account_number = $requestData['account_number'];
        $bank_name = $requestData['bank_name'];
        $branch_name = $requestData['branch_name'];
        $branch_ifsc = $requestData['branch_ifsc'];
        
        if (isset($_FILES['bank_image']) && !empty($_FILES['bank_image'])) {
            $randdom = round(microtime(time() * 1000)) . rand(000, 999);
            $file_extension1 = pathinfo($_FILES['bank_image']["name"], PATHINFO_EXTENSION);
            $file_name1 = $randdom . '.' . $file_extension1;
            if ($_FILES['bank_image']["error"] <= 0) {
                move_uploaded_file($_FILES['bank_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'user/'  . $file_name1);
                $image = $file_name1;
            }
        } else {
            $image = 'NA';
        }
        
        $model = new Sitefunction();
        $check_registration_no = $model->get_all_rows(TBL_PERMANENT_VACATION , '*' , array(),array(),array('id' => 'DESC'));
        
        if(sizeof($check_registration_no) > 0){
            $registration_no = ++$check_registration_no[0]['registration_no'];
        }else{
            $registration_no = 'PV00001';
        }
        
        $model = new Sitefunction();
        $user_details = $model->get_all_rows(TBL_USER_REGISTRATION , '*' , array('id' => $user_id));
        
        $join = array(
            TBL_BEDS . ' as b' => 'b.id=t.bed_id',
            TBL_ROOM . ' as r' => 'r.id=b.room_id',
        );
        $model = new Sitefunction();
        $accomodation_result = $model->get_all_rows(TBL_TRANSACTION . ' as t', 'r.room_no', array('t.student_id' => $user_details[0]['student_id']),$join);
        
        if(sizeof($accomodation_result) > 0){
            $room_no = $accomodation_result[0]['room_no'];
        }else{
            $room_no = 'NA';
        }
        $model = new Sitefunction();
        $data = array(
            'name' => $user_details[0]['name'],
            'student_id' => $user_details[0]['student_id'],
            'registration_no' => $registration_no,
            'course_type' => $user_details[0]['course_type'],
            'department' => $user_details[0]['diat_dep_name'],
            'joining_date' => $user_details[0]['created_at'],
            'room_no' => $room_no,
            'permanent_vacation_date'=>$permanent_vacation_date,
            'mobile_no' => $user_details[0]['mobile_no'],
            'deposit' => $deposit,
            'mess_balance' => $mess_balance,
            'date_mess'=> $this->utc_time,
            'total_balance' => $deposit + $mess_balance,
            'date_tobalance' => $this->utc_time,
            'account_name' => $account_name,
            'bankaccount_no' => $account_number,
            'bank_name' => $bank_name,
            'branch_name' => $branch_name,
            'ifsc_code' => $branch_ifsc,
            'image' => $image,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_PERMANENT_VACATION, $data);
        $data = array(
            'message' => 'Permanent vacation added successfully',
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }

    public function add_mess_rebate(){
        $requestData = $this->request->getPost();
        $user_id = $requestData['user_id'];
        $start_date = $requestData['start_date'];
        $end_date = $requestData['end_date'];
        
        if (isset($_FILES['rebate_reason']) && !empty($_FILES['rebate_reason'])) {
            $randdom = round(microtime(time() * 1000)) . rand(000, 999);
            $file_extension1 = pathinfo($_FILES['rebate_reason']["name"], PATHINFO_EXTENSION);
            $file_name1 = $randdom . '.' . $file_extension1;
            if ($_FILES['rebate_reason']["error"] <= 0) {
                move_uploaded_file($_FILES['rebate_reason']['tmp_name'], IMAGE_UPLOAD_PATH . 'user/'  . $file_name1);
                $image = $file_name1;
            }
        } else {
            $image = 'NA';
        }
        
        $model = new Sitefunction();
        $user_details = $model->get_all_rows(TBL_USER_REGISTRATION , '*' , array('id' => $user_id));
        
        $join = array(
            TBL_BEDS . ' as b' => 'b.id=t.bed_id',
            TBL_ROOM . ' as r' => 'r.id=b.room_id',
        );
        $model = new Sitefunction();
        $accomodation_result = $model->get_all_rows(TBL_TRANSACTION . ' as t', 'r.room_no', array('t.student_id' => $user_details[0]['student_id']),$join);
        
        if(sizeof($accomodation_result) > 0){
            $room_no = $accomodation_result[0]['room_no'];
        }else{
            $room_no = 'NA';
        }
        
        $date1 = \DateTime::createFromFormat('d/m/Y', $start_date);
        $date2 = \DateTime::createFromFormat('d/m/Y', $end_date);
        $date1 = new \DateTime($date1->format('Y-m-d'));
        $date2 = new \DateTime($date2->format('Y-m-d'));
        
        $interval = $date1->diff($date2);

        $model = new Sitefunction();
        $data = array(
            'name' => $user_details[0]['name'],
            'student_id' => $user_details[0]['student_id'],
            'enrollment_no' => $user_details[0]['student_id'],
            'course_type' => $user_details[0]['course_type'],
            'mobile_no' => $user_details[0]['mobile_no'],
            'room_no' => $room_no,
            'start_date' => $start_date,
            'end_date'=> $end_date,
            'no_of_days' => $interval->days,
            'image' => $image,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_MESS_REBATE, $data);
        $data = array(
            'message' => 'Mess Rebate added successfully',
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
        
    }
}