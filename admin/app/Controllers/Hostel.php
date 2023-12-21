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


    public function roomwise($id)
    {
         $model = new Sitefunction();
         $join = array(
            TBL_BEDS . ' as m' => 'm.id=mmd.block_id'
        );
        $this->dataModule['hostel'] = $model->get_all_rows(TBL_BLOCK . ' as mmd', 'mmd.*,m.name', array(), $join);

           
    }

    
}