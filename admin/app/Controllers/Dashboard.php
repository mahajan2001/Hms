<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

class Dashboard extends MyController
{
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
        // $model = new Sitefunction();
        // $this->dataModule['Ghostel'] = $model->get_all_rows(TBL_ROOM, ' COUNT(*) as available_room_count', array('hostel_id' => 1),array(),'','','',array(),'hostel_id');
        // $model = new Sitefunction();
        // $this->dataModule['Khostel'] = $model->get_all_rows(TBL_ROOM, ' COUNT(*) as available_room_count', array('hostel_id' => 2),array(),'','','',array(),'hostel_id');
        // $model = new Sitefunction();
        // $this->dataModule['Yhostel'] = $model->get_all_rows(TBL_ROOM, ' COUNT(*) as available_room_count', array('hostel_id' => 3),array(),'','','',array(),'hostel_id');
        // $model = new Sitefunction();
        // $this->dataModule['Gohostel'] = $model->get_all_rows(TBL_ROOM, ' COUNT(*) as available_room_count', array('hostel_id' => 4),array(),'','','',array(),'hostel_id');

        $model = new Sitefunction();
        $this->dataModule['Ghostel'] = $model->get_all_rows(TBL_HOSTEL, '*', array('id' => 1));
        $model = new Sitefunction();
        $this->dataModule['Khostel'] = $model->get_all_rows(TBL_HOSTEL, '*', array('id' => 2));
        $model = new Sitefunction();
        $this->dataModule['Yhostel'] = $model->get_all_rows(TBL_HOSTEL, '*', array('id' => 3));
        $model = new Sitefunction();
        $this->dataModule['Gohostel'] = $model->get_all_rows(TBL_HOSTEL, '*', array('id' => 4));
        echo view('dashboard/index', $this->dataModule);  
    }
}
