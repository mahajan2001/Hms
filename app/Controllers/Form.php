<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

class Form extends MyController
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

    public function addForm()
    {
        $requestData = $this->request->getJson();
        $lihunGhenare = $requestData->lihunGhenare;
        $lihunDenare = $requestData->lihunDenare;
        $milkatichiMahiti = $requestData->milkatichi_mahiti;

        $milkatType = '';
        if ($milkatichiMahiti[0]->is_sat_bara == 1) {
            $milkatType = SATBARA;
        }
        if ($milkatichiMahiti[0]->is_siti_sarveshan == 1) {
            $milkatType = SITI_SARVESHAN;
        }
        if ($milkatichiMahiti[0]->is_8_a == 1) {
            $milkatType = EIGHT_A;
        }
        $mainFormEntry = array(
            'milkat_village' => $milkatichiMahiti[0]->village_name,
            'milkat_type' => $milkatType,
            'milkat_direction_east' => $milkatichiMahiti[0]->g_name_east,
            'milkat_direction_west' => $milkatichiMahiti[0]->g_name_west,
            'milkat_direction_north' => $milkatichiMahiti[0]->g_name_north,
            'milkat_direction_south' => $milkatichiMahiti[0]->g_name_south,
            'witness_name' => $milkatichiMahiti[0]->sakshidar_name,
            'witness_age' => $milkatichiMahiti[0]->sakshidar_age,
            'witness_mobile_no' => $milkatichiMahiti[0]->sakshidar_mobile,
            'witness_address' => $milkatichiMahiti[0]->sakshidar_address,
            'status' => 1,
            'created' => $this->utc_time,
            'updated' => $this->utc_time
        );
        $model = new Sitefunction();
        $model->protect(false);
        $mainFormID = $model->insert_data(TBL_MAIN_FORM, $mainFormEntry);

        for ($i = 0; $i < sizeof($lihunGhenare); $i++) {
            $lihunGhenareArray = array(
                'form_id' => $mainFormID,
                'name' => $lihunGhenare[$i]->name,
                'age' => $lihunGhenare[$i]->age,
                'mobile_no' => $lihunGhenare[$i]->mobile,
                'aadhar_no' => $lihunGhenare[$i]->addhar,
                'pan_number' => $lihunGhenare[$i]->panNo,
                'address' => $lihunGhenare[$i]->address,
                'status' => 1,
                'created' => $this->utc_time,
                'updated' => $this->utc_time,
            );
            $model = new Sitefunction();
            $model->protect(false);
            $model->insert_data(TBL_LIHUN_GHENARE, $lihunGhenareArray);
        }

        for ($i = 0; $i < sizeof($lihunDenare); $i++) {
            $lihunDenareArray = array(
                'form_id' => $mainFormID,
                'name' => $lihunDenare[$i]->name,
                'age' => $lihunDenare[$i]->age,
                'mobile_no' => $lihunDenare[$i]->mobile,
                'aadhar_no' => $lihunDenare[$i]->addhar,
                'pan_number' => $lihunDenare[$i]->panNo,
                'address' => $lihunDenare[$i]->address,
                'status' => 1,
                'created' => $this->utc_time,
                'updated' => $this->utc_time,
            );
            $model = new Sitefunction();
            $model->protect(false);
            $model->insert_data(TBL_LIHUN_DENARE, $lihunDenareArray);
        }
        $responseData = array(
            'message' => 'Form data added successfully',
        );
        $this->dataModule = $this->success($responseData);
        return $this->respond($this->dataModule);
    }
}
