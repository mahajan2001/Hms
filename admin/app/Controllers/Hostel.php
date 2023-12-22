<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class Hostel extends MyController
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
        $this->dataModule['hostel'] = $model->get_all_rows(TBL_BEDS, '*');
      
        echo view('hostel/index', $this->dataModule);  
    }

    public function hosteladd()
    {
        
        echo view('hostel/addhostel', $this->dataModule);  
    }

    public function addhostel()
    {
        $requestData = $this->request->getJson();
        $hostel_name = $requestData->hostel_name;
        $available_beds = $requestData->available_beds;
        $total_room = $requestData->total_room;
        
        $model = new Sitefunction();
        $data = array(
            'name' => $hostel_name,
            'total_available_beds' =>$available_beds,
            'total_rooms' =>$total_room,

        );

        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_HOSTEL, $data);
        if ($addresult) {
            // $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added student with name ' . $name;
            // $this->addMemberlog($action);
            $data = array(
                'message' => 'Hostel added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_HOSTEL, '*', array('id' => $id));
        $this->dataModule['hostel'] = $result;
        echo view('hostel/edithostel', $this->dataModule);
    }

    public function edithostel()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $hostel_name = $requestData->hostel_name;
        $available_beds = $requestData->available_beds;
        $total_room = $requestData->total_room;

        $model = new Sitefunction();
        $data = array(
            'name' => $hostel_name,
            'total_available_beds' =>$available_beds,
            'total_rooms' =>$total_room,

        );

        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_HOSTEL, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Hostel details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }



   
    


    
}