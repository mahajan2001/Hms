<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Livingout extends MyController
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
        $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS . ' as mmd', 'mmd.*,m.name',array('type' => 2),$join);
        echo view('livingout/livingout', $this->dataModule);
    }

    //add new subadmin view 

    public function add()
    {
        $model = new Sitefunction();
        $this->dataModule['officers'] = $model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1));

        $model = new Sitefunction();
        $icNoCheck = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, '*',array(),array(),array('id' => 'DESC'));
        if(sizeof($icNoCheck) > 0){
            $icNo = ++$icNoCheck[0]['ic_code'];
        }else{
            $icNo = 'IC-0001';
        }
        $this->dataModule['ic_no'] = $icNo;
        echo view('livingout/add', $this->dataModule);
    }

    //edit subadmin details view

    public function edit($id)
    {
        $this->dataModule['id'] = $id;
        $model = new Sitefunction();
        $this->dataModule['officers'] = $model->get_all_rows(TBL_MEMBERS, '*', array('user_type' => 1));
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MONTHLY_MESS_DETAILS, '*', array('id' => $id));
        $this->dataModule['livingoutdetails'] = $result;
        echo view('livingout/edit', $this->dataModule);
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
        $amenities = $requestData->amenities;
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
            'bill_of_month' =>  $billofmonth,
            'date' =>  $date,
            'mess_subscription' => $messsubscription,
            'sports' =>  $sports,
            'bar' => $bar,
            'mess_maintainance' =>  $messmaintainance,
            'officers_institute' => $officersinstitute,
            'party_bar' =>  $partybar,
            'mess_service' => $messservice,
            'ladies_club' =>  $ladiesclub,
            'room_bearer' =>  $roombearer,
            'daily_messing' => $dailymessing,
            'officers_cafeteria' =>  $officerscafeteria,
            'linen' => $linen,
            'extra_messing' =>  $extramessing,
            'srf_fund' => $srffund,
            'cleaning_gear' =>  $cleaninggear,
            'party_messsing' => $partymesssing,
            'entert_ainment' =>  $entertainment,
            'room_rent' => $roomrent,
            'garden' =>  $garden,
            'library' => $library,
            'breakage' =>  $breakage,
            'sarang' => $sarang,
            'hospitality_fund' =>  $hospitalityfund,
            'emp_contingency' => $empcontingency,
            'social_wellbeing' =>  $socialwellbeing,
            'memento' => $memento,
            'security_deposit' =>  $securitydeposit,
            'refund' =>  $refund,
            'penalty' =>  $penalty,
            'arrears' =>  $arrears,
            'qm_packing' =>  $qmpacking,
            'no_of_days' =>  $noofdays,
            'garbage_collection' =>  $garbagecollection,
            'barber_recovery' =>  $barberrecovery,
            'credit_debit' =>  $creditdebit,
            'total' =>  $total,
            'amenities' =>  $amenities,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time,
            'type' => 2,
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
        $amenities = $requestData->amenities;

        $model = new Sitefunction();
        $data = array(
            'member_id' => $name,
            'course' => $course,
            'ic_code' => $iccode,
            'rank' => $rank,
            'bill_of_month' =>  $billofmonth,
            'date' =>  $date,
            'mess_subscription' => $messsubscription,
            'sports' =>  $sports,
            'bar' => $bar,
            'mess_maintainance' =>  $messmaintainance,
            'officers_institute' => $officersinstitute,
            'party_bar' =>  $partybar,
            'mess_service' => $messservice,
            'ladies_club' =>  $ladiesclub,
            'room_bearer' =>  $roombearer,
            'daily_messing' => $dailymessing,
            'officers_cafeteria' =>  $officerscafeteria,
            'linen' => $linen,
            'extra_messing' =>  $extramessing,
            'srf_fund' => $srffund,
            'cleaning_gear' =>  $cleaninggear,
            'party_messsing' => $partymesssing,
            'entert_ainment' =>  $entertainment,
            'room_rent' => $roomrent,
            'garden' =>  $garden,
            'library' => $library,
            'breakage' =>  $breakage,
            'sarang' => $sarang,
            'hospitality_fund' =>  $hospitalityfund,
            'emp_contingency' => $empcontingency,
            'social_wellbeing' =>  $socialwellbeing,
            'memento' => $memento,
            'security_deposit' =>  $securitydeposit,
            'refund' =>  $refund,
            'penalty' =>  $penalty,
            'arrears' =>  $arrears,
            'qm_packing' =>  $qmpacking,
            'no_of_days' =>  $noofdays,
            'garbage_collection' =>  $garbagecollection,
            'barber_recovery' =>  $barberrecovery,
            'credit_debit' =>  $creditdebit,
            'amenities' =>  $amenities,
            'total' =>  $total,
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
}
