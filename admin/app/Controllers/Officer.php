<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Officer extends MyController
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
        $this->dataModule['officers'] = $model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1));
        echo view('officer/index', $this->dataModule);
    }

    public function fetchGuests()
    {
        $model = new Sitefunction();
        $this->dataModule['guests'] = $model->get_all_rows(TBL_MEMBERS, '*' , array('user_type' => 2));
        echo view('guest/index', $this->dataModule);
    }

    public function add()
    {
        echo view('officer/add', $this->dataModule);
    }

    public function addGuestView()
    {
        echo view('guest/add', $this->dataModule);
    }

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
        $this->dataModule['officer'] = $result;
        echo view('officer/edit', $this->dataModule);
    }

    public function editGuestView($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
        $this->dataModule['guest'] = $result;
        echo view('guest/edit', $this->dataModule);
    }

    public function addOfficer()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $sub_course = $requestData->sub_course;
      //  $course = $requestData->course;
        $faculty = $requestData->faculty;
        $rank = $requestData->rank;
        $member_type = $requestData->member_type;
        $messing = $requestData->messing;
        $ic_no = $requestData->ic_no;
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'user_type' => 1,
            'email' => $email,
            'contact' => $contact,
            'sub_course' => $sub_course,
           // 'course' => $course,
            'faculty' => $faculty,
            'rank' => $rank,
            'member_type' => $member_type,
            'messing' => $messing,
            'ic_no' => $ic_no,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_MEMBERS, $data);
        if ($addresult) {
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added officer with name ' . $name;
            $this->addMemberlog($action);
            $data = array(
                'message' => 'Officer added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function addGuest()
    {
        $requestData = $this->request->getJson();
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $sub_course = $requestData->sub_course;
        $course = $requestData->course;
        $faculty = $requestData->faculty;
        $rank = $requestData->rank;
        $member_type = $requestData->member_type;
        $messing = $requestData->messing;
        $ic_no = $requestData->ic_no;
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'email' => $email,
            'user_type' => 2,
            'contact' => $contact,
            'sub_course' => $sub_course,
            'course' => $course,
            'faculty' => $faculty,
            'rank' => $rank,
            'member_type' => $member_type,
            'messing' => $messing,
            'ic_no' => $ic_no,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_MEMBERS, $data);
        if ($addresult) { 
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' added Guest with name ' . $name;
            $this->addMemberlog($action);  
            $data = array(
                'message' => 'Guest added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function editOfficer()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $sub_course = $requestData->sub_course;
       // $course = $requestData->course;
        $faculty = $requestData->faculty;
        $rank = $requestData->rank;
        $member_type = $requestData->member_type;
        $messing = $requestData->messing;
        $ic_no = $requestData->ic_no;
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'sub_course' => $sub_course,
           // 'course' => $course,
            'faculty' => $faculty,
            'rank' => $rank,
            'member_type' => $member_type,
            'messing' => $messing,
            'ic_no' => $ic_no,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_MEMBERS, $data, array('id' => $id));
        if ($addresult) { 
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' updated officer with name ' . $name;
            $this->addMemberlog($action);  
            $data = array(
                'message' => 'Officer details updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function editGuest()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->name;
        $email = $requestData->email;
        $contact = $requestData->contact;
        $sub_course = $requestData->sub_course;
        $course = $requestData->course;
        $faculty = $requestData->faculty;
        $rank = $requestData->rank;
        $member_type = $requestData->member_type;
        $messing = $requestData->messing;
        $ic_no = $requestData->ic_no;
        $model = new Sitefunction();
        $data = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'sub_course' => $sub_course,
            'course' => $course,
            'faculty' => $faculty,
            'rank' => $rank,
            'member_type' => $member_type,
            'messing' => $messing,
            'ic_no' => $ic_no,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_MEMBERS, $data, array('id' => $id));
        if ($addresult) { 
            $action = 'Admin ID ' . $this->session->get('admin_id') . ' and name ' . $this->session->get('admin_name') . ' updated guest with name ' . $name;
            $this->addMemberlog($action);  
            $data = array(
                'message' => 'Guest details updated successfully',
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
        $model->update_data(TBL_MEMBERS, $data_array, array('id' => $id));
        $data = array(
            'message' => 'Officer status updated Successfully '
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

    public function fetchofficerdetails()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
        echo json_encode($result);
    }
}