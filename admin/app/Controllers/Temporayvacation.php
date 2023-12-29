<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;

class Temporayvacation extends MyController
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
        $this->dataModule['temporayvacation'] = $model->get_all_rows(TBL_TEMPORARY_VACATION, '*');
        echo view('temporayvacation/index', $this->dataModule);
    }

    
    public function temporary_vacation()
    {
        $model = new Sitefunction();
        $this->dataModule['student'] = $model->get_all_rows(TBL_USER_REGISTRATION, '*');

        echo view('temporayvacation/temporatry_vacation', $this->dataModule);
    }


    public function addtemporayvacation()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->name;
        $registration_no = $requestData->registration_no;
        $course_type = $requestData->course_type;
        $department =  $requestData->department;
        $js_date = $requestData ->js_date;
        $room_no = $requestData->room_no;
        $tvh_date = $requestData->tvh_date;
        $mobile_no = $requestData->mobile_no;
        $deposit = $requestData->deposit;
        $mess_balance = $requestData->mess_balance;
      //  $receipt_no_mess = $requestData->receipt_no_mess;
      //  $date_mess = $requestData->date_mess;
        $total_balance = $requestData->total_balance;
       // $receipt_no_tobalance= $requestData->receipt_no_tobalance;
       // $date_tobalance = $requestData->date_tobalance;
        
        $data = array(
            'name' => $name,
            'registration_no' => $registration_no,
            'course_type' => $course_type,
            'department'=> $department,
            'joining_date'=>$js_date,
            'room_no' => $room_no,
            'temporary_vacation_date' => $tvh_date,
            'mobile_no'=>$mobile_no,
            'deposit' => $deposit,
            'mess_balance' => $mess_balance,
            //'receipt_no_mess' => $receipt_no_mess,
            //'date_mess'=>$date_mess,
            'total_balance' => $total_balance,
           // 'receipt_no_tobalance' => $receipt_no_tobalance,
           // 'date_tobalance' => $date_tobalance,
            'status' => 0,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_TEMPORARY_VACATION, $data);
        if ($addresult) {
           
            $data = array(
                'message' => 'Student added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }
   

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();

        $result = $model->get_single_row(TBL_TEMPORARY_VACATION, '*', array('id' => $id));
        $this->dataModule['temporayvacation'] = $result;
        echo view('temporayvacation/temporayvacation_edit', $this->dataModule);
    }


    public function edittemporayvacation()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $registration_no = $requestData->registration_no;
        $course_type = $requestData->course_type;
        $department =  $requestData->department;
        $js_date = $requestData ->js_date;
        $room_no = $requestData->room_no;
        $tvh_date = $requestData->tvh_date;
        $mobile_no = $requestData->mobile_no;
        $deposit = $requestData->deposit;
        $mess_balance = $requestData->mess_balance;
      //  $receipt_no_mess = $requestData->receipt_no_mess;
       // $date_mess = $requestData->date_mess;
        $total_balance = $requestData->total_balance;
       // $receipt_no_tobalance= $requestData->receipt_no_tobalance;
       // $date_tobalance = $requestData->date_tobalance;

        $data = array(
            'name' => $name,
            'registration_no' => $registration_no,
            'course_type' => $course_type,
            'department'=> $department,
            'joining_date'=>$js_date,
            'room_no' => $room_no,
            'temporary_vacation_date' => $tvh_date,
            'mobile_no'=>$mobile_no,
            'deposit' => $deposit,
            'mess_balance' => $mess_balance,
           // 'receipt_no_mess' => $receipt_no_mess,
           // 'date_mess'=>$date_mess,
            'total_balance' => $total_balance,
           // 'receipt_no_tobalance' => $receipt_no_tobalance,
            //'date_tobalance' => $date_tobalance,
            'status' => 1,
            'created_at' => $this->utc_time,
            'updated_at' => $this->utc_time,
        );

        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_TEMPORARY_VACATION, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Temporay Vacation details updated successfully',
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
        $model->update_data(TBL_TEMPORARY_VACATION, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Student Temporary Vacation status updated Successfully '
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }
  

    public function view($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_TEMPORARY_VACATION, '*', array('id' => $id));
        $this->dataModule['tempView'] = $result;
        echo view('temporayvacation/view', $this->dataModule);
    }
}
