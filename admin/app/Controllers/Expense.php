<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Expense extends MyController
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
            TBL_VENDORS . ' as m' => 'm.id=e.vendor_id'
        );
        $this->dataModule['expenses'] = $model->get_all_rows(TBL_EXPENSE . ' as e', 'e.*,m.name',array(),$join);
        
        echo view('expense/index', $this->dataModule);
    }

    public function add()
    {
        $model = new Sitefunction();
        $this->dataModule['vendors'] = $model->get_all_rows(TBL_VENDORS , '*', array('status' => 1));
        echo view('expense/add', $this->dataModule);
    }
    
    public function edit($id)
    {
        $model = new Sitefunction();
        $this->dataModule['vendors'] = $model->get_all_rows(TBL_VENDORS , '*', array('status' => 1));
        $model = new Sitefunction();
        $join = array(
            TBL_EXPENSE_DETAILS . ' as ed' => 'ed.expense_id=e.id',
        );
        $this->dataModule['expenseDetails'] = $model->get_all_rows(TBL_EXPENSE . ' as e' , 'e.*,ed.*', array('e.id' => $id),$join);
        echo view('expense/edit', $this->dataModule);
    }

    public function generateexpense()
    {
        // $model = new Sitefunction();
        // $join = array(
        //     TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        // );
        // $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd', 'mmd.*,m.name', array('type' => 1),$join);
        // echo view('invoice/pdf', $this->dataModule);
    }

    public function addexpense()
    {
        $requestData = $this->request->getJson();
        $vendor_id = $requestData->vendor;
        $total = $requestData->totalAmount;
        $date = $requestData->expense_date;
        $expense_status = $requestData->status;
        $itemArray = $requestData->itemArray;

        $model = new Sitefunction();
        $data = array(
            'vendor_id' => $vendor_id,
            'total' => $total,
            'expense_status' => $expense_status,
            'date' => $date,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addID = $model->insert_data(TBL_EXPENSE, $data);
        
        foreach($itemArray as $key => $value){
            $data = array(
                'expense_id' => $addID,
                'item_name' => $value->name,
                'quantity' => $value->qty,
                'rate' => $value->rate,
                'subtotal' => $value->subtotal,
                'status' => 1,
                'created' => $this->utc_time,
                'updated' => $this->utc_time,
            );
            $model = new Sitefunction();
            $model->protect(false);
            $model->insert_data(TBL_EXPENSE_DETAILS, $data);
        }
        if ($addresult) {
            $data = array(
                'message' => 'EXPENSE added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }
    
    public function updateExpense()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $vendor_id = $requestData->vendor;
        $total = $requestData->totalAmount;
        $date = $requestData->expense_date;
        $expense_status = $requestData->status;
        $itemArray = $requestData->itemArray;
        
        $model = new Sitefunction();
        $data = array(
            'vendor_id' => $vendor_id,
            'total' => $total,
            'expense_status' => $expense_status,
            'date' => $date,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_EXPENSE, $data , array('id' => $id));
        
        $model = new Sitefunction();
        $model->protect(false);
        $model->delete_data(TBL_EXPENSE_DETAILS, array('expense_id' => $id));
        
        foreach($itemArray as $key => $value){
            $data = array(
                'expense_id' => $id,
                'item_name' => $value->name,
                'quantity' => $value->qty,
                'rate' => $value->rate,
                'subtotal' => $value->subtotal,
                'status' => 1,
                'created' => $this->utc_time,
                'updated' => $this->utc_time,
            );
            $model = new Sitefunction();
            $model->protect(false);
            $model->insert_data(TBL_EXPENSE_DETAILS, $data);
        }
        if ($addresult) {
            $data = array(
                'message' => 'EXPENSE updated successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function fetchexpensedetails()
    {
        // $requestData = $this->request->getJson();
        // $id = $requestData->id;
        // $model = new Sitefunction();
        // $join = array(
        //     TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        // );
        // $result = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd' , 'mmd.*, m.name', array('mmd.id' => $id),$join);
        // echo json_encode($result);
    }

    public function viewPDF($id){
        // $model = new Sitefunction();
        // $join = array(
        //     TBL_MONTHLY_MESS_DETAILS . ' as m' => 'm.id=i.iccode'
        // );
        // $result = $model->get_all_rows(TBL_INVOICE . ' as i' , 'i.*, m.*',array('i.id' => $id),$join);
        // $this->dataModule["invoiceDetails"] = $result;
        // echo view('invoice/pdf', $this->dataModule);
    }
    // public function sendmail(){
    //     echo view('invoice/pdf');
    // }

    //  public function pdf()
    // {
    //     // Load the PDF view
    //     $data = []; // Add any data you want to pass to the view
    //     $view = view('invoice/pdf_view', $data);

    //     // Create a Dompdf instance
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);

    //     $dompdf = new Dompdf($options);

    //     // Load HTML content
    //     $dompdf->loadHtml($view);

    //     // Render PDF
    //     $dompdf->render();

    //     // Output PDF
    //     $dompdf->stream();
       
    // }
}