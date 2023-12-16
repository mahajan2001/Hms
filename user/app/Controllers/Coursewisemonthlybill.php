<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\Console\Descriptor\JsonDescriptor;
use CodeIgniter\API\ResponseTrait;
use PHPUnit\Util\Json;

class Coursewisemonthlybill extends MyController
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

    public function index($month = '')
    {
        if ($month == '') {
            $model = new Sitefunction();
            $select = 'course,SUM(mess_subscription) as total_mess_subscription, SUM(mess_maintainance) as total_mess_maintainance,SUM(mess_service) as total_mess_service,SUM(daily_messing) as total_daily_messing,SUM(extra_messing) as total_extra_messing,SUM(srf_fund) as total_srf_fund
            ,SUM(entert_ainment) as total_entert_ainment,SUM(library) as total_library,SUM(hospitality_fund) as total_hospitality_fund,SUM(memento) as total_memento,SUM(garden) as total_garden,SUM(sarang) as total_sarang,SUM(social_wellbeing) as total_social_wellbeing,SUM(refund) as total_refund,SUM(qm_packing) as total_qm_packing,SUM(sports) as total_sports,SUM(ladies_club) as total_ladies_club,SUM(bar) as total_bar,SUM(party_bar) as total_party_bar
            ,SUM(room_bearer) as total_room_bearer,SUM(linen) as total_linen,SUM(cleaning_gear) as total_cleaning_gear,SUM(party_messsing) as total_party_messsing,SUM(room_rent) as total_room_rent,SUM(breakage) as total_breakage,SUM(emp_contingency) as total_emp_contingency,SUM(penalty) as total_penalty,SUM(arrears) as total_arrears
            ,SUM(credit_debit) as total_credit_debit,SUM(total) as total_total,SUM(security_deposit) as total_security_deposit,SUM(officers_institute) as total_officers_institute,SUM(room_bearer) as total_room_bearer ';
            $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, $select, array(), array(), array(), '', '', array(), 'course');
            $model = new Sitefunction();
            $select = 'SUM(mess_subscription) as total_mess_subscription, SUM(mess_maintainance) as total_mess_maintainance,SUM(mess_service) as total_mess_service,SUM(daily_messing) as total_daily_messing,SUM(extra_messing) as total_extra_messing,SUM(srf_fund) as total_srf_fund
            ,SUM(entert_ainment) as total_entert_ainment,SUM(library) as total_library,SUM(hospitality_fund) as total_hospitality_fund,SUM(memento) as total_memento,SUM(garden) as total_garden,SUM(sarang) as total_sarang,SUM(social_wellbeing) as total_social_wellbeing,SUM(refund) as total_refund,SUM(qm_packing) as total_qm_packing,SUM(sports) as total_sports,SUM(ladies_club) as total_ladies_club,SUM(bar) as total_bar,SUM(party_bar) as total_party_bar
            ,SUM(room_bearer) as total_room_bearer,SUM(linen) as total_linen,SUM(cleaning_gear) as total_cleaning_gear,SUM(party_messsing) as total_party_messsing,SUM(room_rent) as total_room_rent,SUM(breakage) as total_breakage,SUM(emp_contingency) as total_emp_contingency,SUM(penalty) as total_penalty,SUM(arrears) as total_arrears
            ,SUM(credit_debit) as total_credit_debit,SUM(total) as total_total,SUM(security_deposit) as total_security_deposit,SUM(officers_institute) as total_officers_institute,SUM(room_bearer) as total_room_bearer ';
            $totalResult = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, $select, array(), array(), array(), '', '', array());
            array_push($this->dataModule['monthlymessdetails'], $totalResult[0]);
            $this->dataModule['defaultMonth'] = '';
            $this->dataModule['title'] = 'MESS BILL SUMMARY FOR ALL MONTHS';
        } else {
            $model = new Sitefunction();
            $select = 'course,SUM(mess_subscription) as total_mess_subscription, SUM(mess_maintainance) as total_mess_maintainance,SUM(mess_service) as total_mess_service,SUM(daily_messing) as total_daily_messing,SUM(extra_messing) as total_extra_messing,SUM(srf_fund) as total_srf_fund
            ,SUM(entert_ainment) as total_entert_ainment,SUM(library) as total_library,SUM(hospitality_fund) as total_hospitality_fund,SUM(memento) as total_memento,SUM(garden) as total_garden,SUM(sarang) as total_sarang,SUM(social_wellbeing) as total_social_wellbeing,SUM(refund) as total_refund,SUM(qm_packing) as total_qm_packing,SUM(sports) as total_sports,SUM(ladies_club) as total_ladies_club,SUM(bar) as total_bar,SUM(party_bar) as total_party_bar
            ,SUM(room_bearer) as total_room_bearer,SUM(linen) as total_linen,SUM(cleaning_gear) as total_cleaning_gear,SUM(party_messsing) as total_party_messsing,SUM(room_rent) as total_room_rent,SUM(breakage) as total_breakage,SUM(emp_contingency) as total_emp_contingency,SUM(penalty) as total_penalty,SUM(arrears) as total_arrears
            ,SUM(credit_debit) as total_credit_debit,SUM(total) as total_total,SUM(security_deposit) as total_security_deposit,SUM(officers_institute) as total_officers_institute,SUM(room_bearer) as total_room_bearer ';
            $this->dataModule['monthlymessdetails'] = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, $select, array('bill_of_month' => $month), array(), array(), '', '', array(), 'course');
            $model = new Sitefunction();
            $select = 'SUM(mess_subscription) as total_mess_subscription, SUM(mess_maintainance) as total_mess_maintainance,SUM(mess_service) as total_mess_service,SUM(daily_messing) as total_daily_messing,SUM(extra_messing) as total_extra_messing,SUM(srf_fund) as total_srf_fund
            ,SUM(entert_ainment) as total_entert_ainment,SUM(library) as total_library,SUM(hospitality_fund) as total_hospitality_fund,SUM(memento) as total_memento,SUM(garden) as total_garden,SUM(sarang) as total_sarang,SUM(social_wellbeing) as total_social_wellbeing,SUM(refund) as total_refund,SUM(qm_packing) as total_qm_packing,SUM(sports) as total_sports,SUM(ladies_club) as total_ladies_club,SUM(bar) as total_bar,SUM(party_bar) as total_party_bar
            ,SUM(room_bearer) as total_room_bearer,SUM(linen) as total_linen,SUM(cleaning_gear) as total_cleaning_gear,SUM(party_messsing) as total_party_messsing,SUM(room_rent) as total_room_rent,SUM(breakage) as total_breakage,SUM(emp_contingency) as total_emp_contingency,SUM(penalty) as total_penalty,SUM(arrears) as total_arrears
            ,SUM(credit_debit) as total_credit_debit,SUM(total) as total_total,SUM(security_deposit) as total_security_deposit,SUM(officers_institute) as total_officers_institute,SUM(room_bearer) as total_room_bearer ';
            $totalResult = $model->get_all_rows(TBL_MONTHLY_MESS_DETAILS, $select, array('bill_of_month' => $month));
            array_push($this->dataModule['monthlymessdetails'], $totalResult[0]);
            $this->dataModule['defaultMonth'] = $month;
            $this->dataModule['title'] = 'MESS BILL SUMMARY FOR MONTH OF ' . $month;
        }
        echo view('coursewisemonthlybill/index', $this->dataModule);
    }
}