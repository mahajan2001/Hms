<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Invoice extends MyController
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
        $join = array(
            TBL_MONTHLY_MESS_DETAILS . ' as m' => 'm.id=i.iccode'
        );
        $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_INVOICE . ' as i', 'i.*,m.ic_code', array(), $join);

        echo view('invoice/index', $this->dataModule);
    }

    public function add()
    {

        // $model = new Sitefunction();
        // $icNoCheck = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*',array(),array(),array('id' => 'DESC'));
        // if(sizeof($icNoCheck) > 0){
        //     $icNo = ++$icNoCheck[0]['ic_code'];
        // }else{
        //     $icNo = 'IC-0001';
        // }
        // $this->dataModule['ic_no'] = $icNo;

        $model = new Sitefunction();
        $result = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*');
        for($i = 0; $i < sizeof($result); $i++){
            if($result[$i]['type'] == 1){
                $result[$i]['messing_type'] = 'Living In';
            }else{
                $result[$i]['messing_type'] = 'Living Out';
            }
        }
        $this->dataModule['invoices'] = $result;
        echo view('invoice/add', $this->dataModule);
    }

    public function generateinvoice()
    {
        $model = new Sitefunction();
        $join = array(
            TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        );
        $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd', 'mmd.*,m.name', array('type' => 1),$join);
        echo view('invoice/pdf', $this->dataModule);
    }

    public function addinvoice()
    {
        $requestData = $this->request->getJson();
        $iccode = $requestData->iccode;
        $name = $requestData->name;
        $month = $requestData->month;
        $messing = $requestData->messing;
        $rank = $requestData->rank;
        $course = $requestData->course;

        $model = new Sitefunction();
        $data = array(
            'iccode' => $iccode,
            'name' => $name,
            'month' => $month,
            'messing' =>  $messing,
            'rank' => $rank,
            'course' =>  $course,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,

        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_INVOICE, $data);
        if ($addresult) {
            $data = array(
                'message' => 'Invoice added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function fetchinvoicedetails()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $model = new Sitefunction();
        $join = array(
            TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        );
        $result = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd' , 'mmd.*, m.name', array('mmd.id' => $id),$join);
        echo json_encode($result);
    }

    public function viewPDF($id){
        $model = new Sitefunction();
        $join = array(
            TBL_MONTHLY_MESS_DETAILS . ' as m' => 'm.id=i.iccode'
        );
        $result = $model->get_all_rows(TBL_INVOICE . ' as i' , 'i.*, m.*',array('i.id' => $id),$join);
        $this->dataModule["invoiceDetails"] = $result;
        echo view('invoice/pdf', $this->dataModule);
    }
    // public function sendmail(){
    //     echo view('invoice/pdf');
    // }

     public function pdf()
    {
        // Load the PDF view
        $data = []; // Add any data you want to pass to the view
        $view = view('invoice/pdf_view', $data);

        // Create a Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($view);

        // Render PDF
        $dompdf->render();

        // Output PDF
        $dompdf->stream();
       
    }
}