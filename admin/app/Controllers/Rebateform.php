<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class Rebateform extends MyController
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
        // echo view('rebateform/add', $this->dataModule);  
        $model = new Sitefunction();
        $this->dataModule['mess_rebate'] = $model->get_all_rows(TBL_MESS_REBATE, '*');
        echo view('rebateform/index', $this->dataModule); 
    }
    
    public function view($id)
    {
        // echo view('rebateform/add', $this->dataModule);  
        $model = new Sitefunction();
        $this->dataModule['mess_rebate_Details'] = $model->get_single_row(TBL_MESS_REBATE, '*' , array('id' => $id));
        echo view('rebateform/add', $this->dataModule); 
    }
}