<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

class Logs extends MyController
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
        echo view('dashboard/index.php', $this->dataModule);
    }

    public function Adminlogs()
    {
        $model = new Sitefunction();
        $result = $model->get_all_rows(TBL_LOGS, '*', array('log_of' => ADMIN), array(), array('created', 'DESC'));
        $this->dataModule['adminLogs'] =  $result;
        echo view('logs/adminlogs', $this->dataModule);
    }

    public function Userlogs()
    {
        $model = new Sitefunction();
        $result = $model->get_all_rows(TBL_LOGS, '*', array('log_of' => USER));
        $this->dataModule['userLogs'] =  $result;
        echo view('logs/userlogs', $this->dataModule);
    }
}
