<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Temporaryduty extends MyController
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

        $model = new Sitefunction();
        $join = array(
            TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        );
        $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd', 'mmd.*,m.name', array('type' => 3), $join);
        echo view('temporaryduty/index', $this->dataModule);
    }

    //add new subadmin view 

    public function add()
    {
        $model = new Sitefunction();
        $this->dataModule['officers'] = $model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1));

        $model = new Sitefunction();
        $icNoCheck = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*', array(), array(), array('id' => 'DESC'));
        if (sizeof($icNoCheck) > 0) {
            $icNo = ++$icNoCheck[0]['ic_code'];
        } else {
            $icNo = 'IC-0001';
        }
        $this->dataModule['ic_no'] = $icNo;
        echo view('temporaryduty/add', $this->dataModule);
    }

    //edit subadmin details view

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $this->dataModule['officers'] = $model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1));
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MONTHLY_MESS_DETAILS, '*', array('id' => $id));
        $this->dataModule['livingindetails'] = $result;
        echo view('temporaryduty/edit', $this->dataModule);
    }

    public function printPdf($id){
        $model = new Sitefunction();
        $join = array(
            TBL_MEMBERS . ' as m' => 'm.id=mmd.member_id'
        );
        $result = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd', 'mmd.*,m.name', array('mmd.id' => $id),$join);
        $this->dataModule['mess_details'] = $result[0];
        echo view('temporaryduty/pdf', $this->dataModule);
    }

    //API's

    //add new subadmin
    //add new subadmin

    public function addMonthlybill()
    {
        $requestData = $this->request->getJson();
        $course = $requestData->course;
        $iccode = $requestData->iccode;
        $rank = $requestData->rank;
        $billofmonth = $requestData->billofmonth;
        $date = $requestData->date;
        $messsubscription = $requestData->messsubscription;
        $name = $requestData->name;

        $sports = $requestData->sports;
        $bar = $requestData->bar;
        $messmaintainance = $requestData->messmaintainance;

        $officersinstitute = $requestData->officersinstitute;
        $partybar = $requestData->partybar;
        $messservice = $requestData->messservice;
        $ladiesclub = $requestData->ladiesclub;
        $roombearer = $requestData->roombearer;

        $dailymessing = $requestData->dailymessing;
        $officerscafeteria = $requestData->officerscafeteria;
        $linen = $requestData->linen;
        $extramessing = $requestData->extramessing;
        $srffund = $requestData->srffund;

        $cleaninggear = $requestData->cleaninggear;
        $partymesssing = $requestData->partymesssing;
        $entertainment = $requestData->entertainment;
        $roomrent = $requestData->roomrent;
        $garden = $requestData->garden;

        $library = $requestData->library;
        $breakage = $requestData->breakage;

        $sarang = $requestData->sarang;
        $hospitalityfund = $requestData->hospitalityfund;
        $empcontingency = $requestData->empcontingency;
        $socialwellbeing = $requestData->socialwellbeing;
        $memento = $requestData->memento;

        $securitydeposit = $requestData->securitydeposit;
        $refund = $requestData->refund;
        $penalty = $requestData->penalty;
        $arrears = $requestData->arrears;
        $qmpacking = $requestData->qmpacking;
        $noofdays = $requestData->noofdays;

        $garbagecollection = $requestData->garbagecollection;
        $barberrecovery = $requestData->barberrecovery;
        $creditdebit = $requestData->creditdebit;
        $total = $requestData->total;

        $model = new Sitefunction();
        $data = array(
            'member_id' => $name,
            'course' => $course,
            'ic_code' => $iccode,
            'rank' => $rank,
            'bill_of_month' => $billofmonth,
            'date' => $date,
            'mess_subscription' => $messsubscription,
            'sports' => $sports,
            'bar' => $bar,
            'mess_maintainance' => $messmaintainance,
            'officers_institute' => $officersinstitute,
            'party_bar' => $partybar,
            'mess_service' => $messservice,
            'ladies_club' => $ladiesclub,
            'room_bearer' => $roombearer,
            'daily_messing' => $dailymessing,
            'officers_cafeteria' => $officerscafeteria,
            'linen' => $linen,
            'extra_messing' => $extramessing,
            'srf_fund' => $srffund,
            'cleaning_gear' => $cleaninggear,
            'party_messsing' => $partymesssing,
            'entert_ainment' => $entertainment,
            'room_rent' => $roomrent,
            'garden' => $garden,
            'library' => $library,
            'breakage' => $breakage,
            'sarang' => $sarang,
            'hospitality_fund' => $hospitalityfund,
            'emp_contingency' => $empcontingency,
            'social_wellbeing' => $socialwellbeing,
            'memento' => $memento,
            'security_deposit' => $securitydeposit,
            'refund' => $refund,
            'penalty' => $penalty,
            'arrears' => $arrears,
            'qm_packing' => $qmpacking,
            'no_of_days' => $noofdays,
            'garbage_collection' => $garbagecollection,
            'barber_recovery' => $barberrecovery,
            'credit_debit' => $creditdebit,
            'total' => $total,
            'amenities' => 0,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
            'type' => 3,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->insert_data(TBL_MONTHLY_MESS_DETAILS, $data);
        if ($addresult) {
            $data = array(
                'message' => 'Monthly mess added successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function editMonthlybill()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $course = $requestData->course;
        $iccode = $requestData->iccode;
        $rank = $requestData->rank;
        $billofmonth = $requestData->billofmonth;
        $date = $requestData->date;
        $messsubscription = $requestData->messsubscription;
        $name = $requestData->name;

        $sports = $requestData->sports;
        $bar = $requestData->bar;
        $messmaintainance = $requestData->messmaintainance;

        $officersinstitute = $requestData->officersinstitute;
        $partybar = $requestData->partybar;
        $messservice = $requestData->messservice;
        $ladiesclub = $requestData->ladiesclub;
        $roombearer = $requestData->roombearer;

        $dailymessing = $requestData->dailymessing;
        $officerscafeteria = $requestData->officerscafeteria;
        $linen = $requestData->linen;
        $extramessing = $requestData->extramessing;
        $srffund = $requestData->srffund;

        $cleaninggear = $requestData->cleaninggear;
        $partymesssing = $requestData->partymesssing;
        $entertainment = $requestData->entertainment;
        $roomrent = $requestData->roomrent;
        $garden = $requestData->garden;

        $library = $requestData->library;
        $breakage = $requestData->breakage;

        $sarang = $requestData->sarang;
        $hospitalityfund = $requestData->hospitalityfund;
        $empcontingency = $requestData->empcontingency;
        $socialwellbeing = $requestData->socialwellbeing;
        $memento = $requestData->memento;

        $securitydeposit = $requestData->securitydeposit;
        $refund = $requestData->refund;
        $penalty = $requestData->penalty;
        $arrears = $requestData->arrears;
        $qmpacking = $requestData->qmpacking;
        $noofdays = $requestData->noofdays;

        $garbagecollection = $requestData->garbagecollection;
        $barberrecovery = $requestData->barberrecovery;
        $creditdebit = $requestData->creditdebit;
        $total = $requestData->total;

        $model = new Sitefunction();
        $data = array(
            'member_id' => $name,
            'course' => $course,
            'ic_code' => $iccode,
            'rank' => $rank,
            'bill_of_month' => $billofmonth,
            'date' => $date,
            'mess_subscription' => $messsubscription,
            'sports' => $sports,
            'bar' => $bar,
            'mess_maintainance' => $messmaintainance,
            'officers_institute' => $officersinstitute,
            'party_bar' => $partybar,
            'mess_service' => $messservice,
            'ladies_club' => $ladiesclub,
            'room_bearer' => $roombearer,
            'daily_messing' => $dailymessing,
            'officers_cafeteria' => $officerscafeteria,
            'linen' => $linen,
            'extra_messing' => $extramessing,
            'srf_fund' => $srffund,
            'cleaning_gear' => $cleaninggear,
            'party_messsing' => $partymesssing,
            'entert_ainment' => $entertainment,
            'room_rent' => $roomrent,
            'garden' => $garden,
            'library' => $library,
            'breakage' => $breakage,
            'sarang' => $sarang,
            'hospitality_fund' => $hospitalityfund,
            'emp_contingency' => $empcontingency,
            'social_wellbeing' => $socialwellbeing,
            'memento' => $memento,
            'security_deposit' => $securitydeposit,
            'refund' => $refund,
            'penalty' => $penalty,
            'arrears' => $arrears,
            'qm_packing' => $qmpacking,
            'no_of_days' => $noofdays,
            'garbage_collection' => $garbagecollection,
            'barber_recovery' => $barberrecovery,
            'credit_debit' => $creditdebit,
            'total' => $total,
            'updated' => $this->utc_time,
        );
        $model = new Sitefunction();
        $model->protect(false);
        $addresult = $model->update_data(TBL_MONTHLY_MESS_DETAILS, $data, array('id' => $id));
        if ($addresult) {
            $data = array(
                'message' => 'Monthly mess edited successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    //edit subadmin 

    public function editSubadmin()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $name = $requestData->subadmin_name;
        $email = $requestData->subadmin_email;
        $contact = $requestData->subadmin_contact;
        $address = $requestData->subadmin_address;
        $adminId = $this->verify();
        if ($adminId != -1) {
            $model = new Sitefunction();
            $resultCount = $model->get_single_row(TBL_MEMBERS, '*', array('member_email' => strtolower($email), 'id !=' => $id));
            $model = new Sitefunction();
            $resultCountContact = $model->get_single_row(TBL_MEMBERS, '*', array('member_contact' => $contact, 'id !=' => $id));
            if (empty($resultCount) && empty($resultCountContact)) {
                $dataarray = array(
                    'member_name' => $name,
                    'member_email' => strtolower($email),
                    'member_contact' => $contact,
                    'member_address' => $address,
                    'status' => 1,
                    'updated' => $this->utc_time
                );
                $model = new Sitefunction();
                $model->protect(false);
                $addresult = $model->update_data(TBL_MEMBERS, $dataarray, array('id' => $id));
                if ($addresult) {
                    $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' Updated details of Sub admin name ' . $name;
                    $this->addMemberlog($action);
                    $data = array(
                        'message' => 'Sub admin details updated Successfully '
                    );
                    $this->dataModule = $this->success($data);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(308)['error']['message']);
                $this->dataModule = $this->failure(308);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    //change subadmin status
    public function change_visibility()
    {
        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;
        $adminId = $this->verify();
        if ($adminId != -1) {
            $model = new Sitefunction();
            $model->protect(false);
            $data_array = array('status' => $status, 'updated' => $this->utc_time);
            $model->update_data(TBL_MEMBERS, $data_array, array('id' => $id));
            $model = new Sitefunction();
            $name = $model->get_single_row(TBL_MEMBERS, '*', array('id' => $id));
            $stat = "";
            if ($status == 1) {
                $stat = "Available";
            } else {
                $stat = "Unavailable";
            }
            $action = 'Admin ID ' . $adminId . ' and name ' . $this->session->get('admin_name') . ' changed status of Sub admin ' . $name['member_name'] . ' to ' . $stat;
            $this->addMemberlog($action);
            $data = array(
                'message' => 'Sub admin status updated Successfully '
            );
            $this->dataModule = $this->success($data);
        } else {
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    public function downloadSampleFile()
    {
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Name');
        $spreadsheet->getActiveSheet()->setCellValue('B1', 'Messing Type');
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'Bill Of Month');
        $spreadsheet->getActiveSheet()->setCellValue('D1', 'Date');
        $spreadsheet->getActiveSheet()->setCellValue('E1', 'Mess Subscription');
        $spreadsheet->getActiveSheet()->setCellValue('F1', 'Sports');
        $spreadsheet->getActiveSheet()->setCellValue('G1', 'Bar');
        $spreadsheet->getActiveSheet()->setCellValue('H1', 'Mess Maintenance');
        $spreadsheet->getActiveSheet()->setCellValue('I1', 'Officers Institute');
        $spreadsheet->getActiveSheet()->setCellValue('J1', 'Party Bar');
        $spreadsheet->getActiveSheet()->setCellValue('K1', 'Mess Service');
        $spreadsheet->getActiveSheet()->setCellValue('L1', 'Ladies Club');
        $spreadsheet->getActiveSheet()->setCellValue('M1', 'Room Bearer');
        $spreadsheet->getActiveSheet()->setCellValue('N1', 'Daily Messing');
        $spreadsheet->getActiveSheet()->setCellValue('O1', 'Officers Cafeteria');
        $spreadsheet->getActiveSheet()->setCellValue('P1', 'Linen');
        $spreadsheet->getActiveSheet()->setCellValue('Q1', 'Extra Messing');
        $spreadsheet->getActiveSheet()->setCellValue('R1', 'SRF Fund');
        $spreadsheet->getActiveSheet()->setCellValue('S1', 'Cleaning Gear');
        $spreadsheet->getActiveSheet()->setCellValue('T1', 'Party Messing');
        $spreadsheet->getActiveSheet()->setCellValue('U1', 'Entertainment');
        $spreadsheet->getActiveSheet()->setCellValue('V1', 'Room Rent');
        $spreadsheet->getActiveSheet()->setCellValue('W1', 'Garden');
        $spreadsheet->getActiveSheet()->setCellValue('X1', 'Library');
        $spreadsheet->getActiveSheet()->setCellValue('Y1', 'Breakage');
        $spreadsheet->getActiveSheet()->setCellValue('Z1', 'Sarang');
        $spreadsheet->getActiveSheet()->setCellValue('AA1', 'Hospitality Fund');
        $spreadsheet->getActiveSheet()->setCellValue('AB1', 'EMP Contingency');
        $spreadsheet->getActiveSheet()->setCellValue('AC1', 'Social Well Being');
        $spreadsheet->getActiveSheet()->setCellValue('AD1', 'Momento');
        $spreadsheet->getActiveSheet()->setCellValue('AE1', 'Security Deposit');
        $spreadsheet->getActiveSheet()->setCellValue('AF1', 'Refund');
        $spreadsheet->getActiveSheet()->setCellValue('AG1', 'Penalty');
        $spreadsheet->getActiveSheet()->setCellValue('AH1', 'Arrears');
        $spreadsheet->getActiveSheet()->setCellValue('AI1', 'QM Packing');
        $spreadsheet->getActiveSheet()->setCellValue('AJ1', 'No of days');
        $spreadsheet->getActiveSheet()->setCellValue('AK1', 'Garbage Collection');
        $spreadsheet->getActiveSheet()->setCellValue('AL1', 'Barber Recovery');
        $spreadsheet->getActiveSheet()->setCellValue('AM1', 'Credit Debit');
        $spreadsheet->getActiveSheet()->setCellValue('AN1', 'Amenities');

        $writer = new Xlsx($spreadsheet);

        $writer->save(IMAGE_UPLOAD_PATH . 'monthlyBill/sampleMonthlyBill.xlsx');

        $outputFileName = IMAGE_UPLOAD_PATH . 'monthlyBill/sampleMonthlyBill.xlsx';
        if (file_exists($outputFileName)) {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . basename($outputFileName) . '"');
            header('Content-Length: ' . filesize($outputFileName));
            readfile($outputFileName);
        } else {
            echo 'The file does not exist.';
        }

        return view('temporaryduty/index', $this->dataModule);
    }

    public function uploadBulkMonthlyMess()
    {

        if ($this->request->getFile('file')->isValid()) {
            // Get the uploaded file
            $file = $this->request->getFile('file');
    
            // Load the PhpSpreadsheet library
    
            // Create a new PhpSpreadsheet reader
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file->getTempName());
    
            // Load the spreadsheet file
            $spreadsheet = $reader->load($file->getTempName());
    
            // Get the active sheet
            $data = $spreadsheet->getActiveSheet()->toArray();
    
            $data2 = array_filter($data, function ($row) {
                // Use array_filter to exclude rows with only empty values
                return !empty(array_filter($row));
            });

            // Iterate through the data
            $resultArr = [];
            for($i = 0; $i  < sizeof($data2); $i++){
                if($i == 0){
                    continue;
                }else{
                    $innerData = $data2[$i];
                    $model = new Sitefunction();
                    $icNoCheck = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*', array(), array(), array('id' => 'DESC'));
                    if (sizeof($icNoCheck) > 0) {
                        $icNo = ++$icNoCheck[0]['ic_code'];
                    } else {
                        $icNo = 'IC-0001';
                    }

                    $model = new Sitefunction();
                    $fetchMemberDetails = $model->get_all_rows(TBL_MEMBERS, '*', array('name' => $innerData[0]));
                    
                    if($innerData[1] == 'Living In'){
                        $type = 1;
                    }elseif ($innerData[1] == 'Living Out') {
                        $type = 2;
                    }elseif ($innerData[1] == 'Temporary Duty') {
                        $type = 3;
                    }else{
                        $type = 4;
                    }
                    $data = array(
                        'member_id' => $fetchMemberDetails[0]['id'],
                        'course' => $fetchMemberDetails[0]['course'],
                        'ic_code' => $icNo,
                        'type' => $type,
                        'rank' => $fetchMemberDetails[0]['rank'],
                        'bill_of_month' => $innerData[2],
                        'date' => $innerData[3],
                        'mess_subscription' => $innerData[4],
                        'sports' => $innerData[5],
                        'bar' => $innerData[6],
                        'mess_maintainance' => $innerData[7],
                        'officers_institute' => $innerData[8],
                        'party_bar' => $innerData[9],
                        'mess_service' => $innerData[10],
                        'ladies_club' => $innerData[11],
                        'room_bearer' => $innerData[12],
                        'daily_messing' => $innerData[13],
                        'officers_cafeteria' => $innerData[14],
                        'linen' => $innerData[15],
                        'extra_messing' => $innerData[16],
                        'srf_fund' => $innerData[17],
                        'cleaning_gear' => $innerData[18],
                        'party_messsing' => $innerData[19],
                        'entert_ainment' => $innerData[20],
                        'room_rent' => $innerData[21],
                        'garden' => $innerData[22],
                        'library' => $innerData[23],
                        'breakage' => $innerData[24],
                        'sarang' => $innerData[25],
                        'hospitality_fund' => $innerData[26],
                        'emp_contingency' => $innerData[27],
                        'social_wellbeing' => $innerData[28],
                        'memento' => $innerData[29],
                        'security_deposit' => $innerData[30],
                        'refund' => $innerData[31],
                        'penalty' => $innerData[32],
                        'arrears' => $innerData[33],
                        'qm_packing' => $innerData[34],
                        'no_of_days' => $innerData[35],
                        'garbage_collection' => $innerData[36],
                        'barber_recovery' => $innerData[37],
                        'credit_debit' => $innerData[38],
                        'amenities' => $innerData[39],
                        'total' => $innerData[4] + $innerData[5] + $innerData[6] + $innerData[7] + $innerData[8]+ $innerData[9]+ $innerData[10]+ $innerData[11]+ $innerData[12]+ $innerData[13]+ $innerData[14]+ $innerData[15]+ $innerData[16]+ $innerData[17]+ $innerData[18]+ $innerData[19]+ $innerData[20]+ $innerData[21]+ $innerData[22]+ $innerData[23]+ $innerData[24]+ $innerData[25]+ $innerData[26]+ $innerData[27]+ $innerData[28] + $innerData[29]+ $innerData[30]+ $innerData[31]+ $innerData[32]+ $innerData[33]+ $innerData[34]+ $innerData[35]+ $innerData[36]+ $innerData[37]+ $innerData[38]+ $innerData[39],
                        'status' => 1,
                        'created' => $this->utc_time,
                        'updated' => $this->utc_time,
                    );
                    $model = new Sitefunction();
                    $model->protect(false);
                    $model->insert_data(TBL_MONTHLY_MESS_DETAILS, $data);
                }
            }
            // Return a response or perform further processing
            // return $this->response->setJSON(['success' => true, 'result' => $resultArr]);
            echo json_encode("true");
        } else {
            // Handle file upload error
            // return $this->response->setJSON(['success' => false]);
            echo json_encode("false");
        }
    }
}