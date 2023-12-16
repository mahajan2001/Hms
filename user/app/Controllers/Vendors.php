<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Vendors extends MyController
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
    //view all subadmins

    public function index()
    {
        $model = new Sitefunction();
        $this->dataModule['vendors'] = $model->get_all_rows(TBL_VENDORS, '*');
        echo view('vendors/index', $this->dataModule);
    }

    public function fetchGuests()
    {
        $model = new Sitefunction();
        $this->dataModule['guests'] = $model->get_all_rows(TBL_MEMBERS, '*' , array('user_type' => 2));
        echo view('guest/index', $this->dataModule);
    }

    public function add()
    {
        echo view('vendors/add', $this->dataModule);
    }

    public function addGuestView()
    {
        echo view('guest/add', $this->dataModule);
    }

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_VENDORS, '*', array('id' => $id));
        $this->dataModule['vendors'] = $result;
        echo view('vendors/edit', $this->dataModule);
    }

    public function editGuestView($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
        $this->dataModule['guest'] = $result;
        echo view('guest/edit', $this->dataModule);
    }

    public function addvendors()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $business = $requestData->business;
        $gst = $requestData->gst;
        $address = $requestData->address;
        $state = $requestData->state;
        $pincode = $requestData->pincode;
      
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'business' => $business,
            'gst' => $gst,
            'address' => $address,
            'state' => $state,
            'pincode' => $pincode,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_VENDORS, $data);
        if ($addresult) {
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added vendors with name ' . $name;
            $this->addMemberlog($action);
            $data = array(
                'message' => 'vendors added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }
    
    public function editvendors()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $business = $requestData->business;
        $gst = $requestData->gst;
        $address = $requestData->address;
        $state = $requestData->state;
        $pincode = $requestData->pincode;
      
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'business' => $business,
            'gst' => $gst,
            'address' => $address,
            'state' => $state,
            'pincode' => $pincode,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_VENDORS, $data, array('id' => $id));
        if ($addresult) {
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' updated vendor with name ' . $name;
            $this->addMemberlog($action);
            $data = array(
                'message' => 'vendors updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }


    //change subadmin status
    public function change_visibility()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $model = new Sitefunction();
        $model->protect(false);
        $data_array = array('status' => $status, 'updated' => $this->utc_time);
        $model->update_data(TBL_VENDORS, $data_array, array('id' => $id));
        $data = array(
            'message' => 'vendors status updated Successfully '
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }

    public function change_visibilityGuest()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $model = new Sitefunction();
        $model->protect(false);
        $data_array = array('status' => $status, 'updated' => $this->utc_time);
        $model->update_data(TBL_MEMBERS, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Guest status updated Successfully '
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }

    public function fetchvendorsdetails()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_VENDORS, '*', array('id' => $id));
        echo json_encode($result);
    }
}