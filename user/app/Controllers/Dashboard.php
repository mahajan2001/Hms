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
        $model = new Sitefunction();
        $this->dataModule['officers'] = sizeof($model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1)));
        $model = new Sitefunction();
        $this->dataModule['livingin'] = sizeof($model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*', array('type' => 1))); 
        $model = new Sitefunction();
        $this->dataModule['livingout'] = sizeof($model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*', array('type' => 2)));
        echo view('dashboard/index.php', $this->dataModule);
    }
}
