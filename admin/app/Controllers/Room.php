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
        $this->dataModule['room'] = $model->get_all_rows(TBL_ROOM, '*');

        // $model = new Sitefunction();
        // $join = array(
        //     TBL_ROOM . ' as m' => 'm.id=mmd.block_id'
        // );
        // $this->dataModule['rooms'] = $model->get_all_rows(TBL_BLOCK . ' as mmd', 'mmd.*,m.name', array(), $join);

        echo view('room/index', $this->dataModule);  
    }
    
    public function addroom_view()
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
  
    public function addroom()
    {
        $requestData = $this->request->getJson();
        $hostel_block = $requestData->hostel_block;
        $hostel_floor = $requestData->hostel_floor;
        $no_of_bed = $requestData->no_of_bed;
        $room_number = $requestData->room_number;

        $model = new Sitefunction();
        $data = array(
            'block_id' => $hostel_block,
            'floor_no' => $hostel_floor,
            'no_of_beds' => $no_of_bed,
            'room_no'  => $room_number,
            
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_ROOM, $data);
        if ($addresult) {
            // $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added student with name ' . $name;
            // $this->addMemberlog($action);
            $data = array(
                'message' => 'Room added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }
   
 

    public function edit($id)
    {
        $model = new Sitefunction();
        $this->dataModule['rooms'] = $model->get_all_rows(TBL_HOSTEL, '*');

        $this->dataModule['id'] = $id;
        $model = new Sitefunction();

        $result = $model->get_single_row(TBL_ROOM, '*', array('id' => $id));
        $this->dataModule['room'] = $result;
        echo view('room/editroom', $this->dataModule);
    }


    public function editroom($id)
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $hostel_block = $requestData->hostel_block;
        $hostel_floor = $requestData->hostel_floor;
        $no_of_bed = $requestData->no_of_bed;
        $room_number = $requestData->room_number;


        $data = array(
            'block_id' => $hostel_block,
            'floor_no' => $hostel_floor,
            'no_of_beds' => $no_of_bed,
            'room_no'  => $room_number,
            
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_ROOM, $data, array('id' => $id));
        if ($addresult) { 
            $data = array(
                'message' => 'Room details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
        

    }
  
}