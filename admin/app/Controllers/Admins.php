<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;
use CodeIgniter\API\ResponseTrait;


class Admins extends MyController
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
        $this->dataModule['admin'] = $model->get_single_row(TBL_ADMIN, '*', array('id' => $this->session->get('admin_id')));
        echo view('admin/profile', $this->dataModule);
    }

    //Edit admin profile 
    public function editprofile()
    {
        $model = new Sitefunction();
        $this->dataModule['results'] = $model->get_single_row(TBL_ADMIN, '*', array('id' => $this->session->get('admin_id')));
        echo view('admin/editprofile', $this->dataModule);
    }

    //change password login
    public function changepasswordLogin()
    {
        echo view('login/changepasswordlogin', $this->dataModule);
    }

    //change password admin profile details
    public function changepassword()
    {
        $model = new Sitefunction();
        $this->dataModule['results'] = $model->get_single_row(TBL_ADMIN, '*', array('id' => $this->session->get('admin_id')));
        echo view('admin/changepassword', $this->dataModule);
    }

    //forot password view
    public function forgotPassword()
    {
        echo view('login/forgotpassword', $this->dataModule);
    }

    //Edit admin profile details
    public function edit()
    {
        $requestData = $this->request->getJson();
        $admin_email = $requestData->admin_email;
        $admin_contact = $requestData->admin_contact;
        $admin_name = $requestData->admin_name;
        $adminID = $this->verify();
        if ($adminID != -1) {
            if (!empty($adminID) && !empty($admin_email) && !empty($admin_contact)) {
                $model = new Sitefunction();
                $checkContact = $model->get_single_row(TBL_ADMIN, '*', array('admin_contact' => $admin_contact, 'id !=' => $adminID));
                $model = new Sitefunction();
                $checkEmail = $model->get_single_row(TBL_ADMIN, '*', array('admin_email' => strtolower($admin_email), 'id !=' => $adminID));
                if (empty($checkContact) && empty($checkEmail)) {

                    $data_array = array(
                        'admin_email' => strtolower($admin_email),
                        'admin_contact' => $admin_contact,
                        'admin_name' => $admin_name,
                        'updated' => $this->utc_time
                    );
                    $model = new Sitefunction();
                    $model->protect(false);
                    $result = $model->update_data(TBL_ADMIN, $data_array, array('id' => $adminID));
                    if ($result) {
                        $model = new Sitefunction();
                        $adminDetails = $model->get_single_row(TBL_ADMIN, '*', array('id' => $adminID));
                        $action = 'Admin ID ' . $adminID . ' name ' . $this->session->get('admin_name') . ' updated email / contact of admin name ' . $adminDetails['admin_name'];
                        $this->addMemberlog($action);
                        $dataArray = array(
                            'message' => 'Profile Details updated successfully',
                            'admin_email' => $admin_email,
                            'admin_contact' => $admin_contact
                        );
                        $this->dataModule = $this->success($dataArray);
                    } else {
                        $this->session->setFlashdata('error', $this->failure(309)['error']['message']);
                        $this->dataModule = $this->failure(309);
                    }
                } else {
                    $this->session->setFlashdata('error', $this->failure(304)['error']['message']);
                    $this->dataModule = $this->failure(304);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
                $this->dataModule = $this->failure(303);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    //Change password admin login
    public function changepass()
    {
        $requestData = $this->request->getJson();
        $password = $requestData->newpassword;
        $confirmpassword = $requestData->confirmpassword;
        if (!empty($password) && !empty($confirmpassword)) {
            if ($password == $confirmpassword) {
                $encryptedpassword = $this->encrypt_password($password);
                $model = new Sitefunction();
                $model->protect(false);
                $result = $model->update_data(TBL_ADMIN, array('admin_password' => $encryptedpassword), array('id' => $this->session->get('admin_id')));
                if ($result) {
                    $model = new Sitefunction();
                    $adminDetails = $model->get_single_row(TBL_ADMIN, '*', array('id' => $this->session->get('admin_id')));
                    $action = 'Admin ID ' . $this->session->get('admin_id') . ' changed password of admin name ' . $adminDetails['admin_name'];
                    $this->addMemberlog($action);
                    $this->session->remove('admin_id');
                    $data = array(
                        'message' => 'Password changed successfully'
                    );
                    $this->dataModule = $this->success($data);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(310)['error']['message']);
                $this->dataModule = $this->failure(310);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
            $this->dataModule = $this->failure(303);
        }
        return $this->respond($this->dataModule);
    }

    //change password admin profile
    public function changepasswordProfile()
    {
        $requestData = $this->request->getJson();
        $password = $requestData->newpassword;
        $confirmpassword = $requestData->confirmpassword;
        $adminID = $this->verify();
        if ($adminID != -1) {

            if (!empty($password) && !empty($confirmpassword)) {

                if ($password == $confirmpassword) {

                    $encryptedpassword = $this->encrypt_password($password);
                    $model = new Sitefunction();
                    $model->protect(false);
                    $result = $model->update_data(TBL_ADMIN, array('admin_password' => $encryptedpassword), array('id' => $adminID));

                    if ($result) {
                        $model = new Sitefunction();
                        $adminDetails = $model->get_single_row(TBL_ADMIN, '*', array('id' => $adminID));
                        $action = 'Admin ID ' . $adminID . ' and name ' . $this->session->get('admin_name') .  ' changed password details of admin name ' . $adminDetails['admin_name'];
                        $this->addMemberlog($action);
                        $data = array(
                            'message' => 'Password changed successfully'
                        );
                        $this->dataModule = $this->success($data);
                    }
                } else {
                    $this->session->setFlashdata('error', $this->failure(310)['error']['message']);
                    $this->dataModule = $this->failure(310);
                }
            } else {
                $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
                $this->dataModule = $this->failure(303);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }

    //forgot password login
    public function forgotPass()
    {
        $requestData = $this->request->getJson();
        $admin_email = $requestData->admin_email;
        if (!empty($admin_email)) {
            $model = new Sitefunction();
            $checkEmail = $model->get_single_row(TBL_ADMIN, '*', array('admin_email' => strtolower($admin_email)));
            if (!empty($checkEmail)) {
                $this->session->set('admin_id', $checkEmail['id']);
                $otp = $this->generateOTP();
                $this->session->set('otp', $otp);
                $this->sendMail($admin_email, 'OTP for forgot password', 'OTP is ' . $otp);
                $this->session->setFlashdata('success', 'OTP sent on email successfully');
                $data = array(
                    'message' => 'OTP sent on email successfully'
                );
                $this->dataModule = $this->success($data);
            } else {
                $this->session->setFlashdata('error', $this->failure(305)['error']['message']);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
            $this->dataModule = $this->failure(303);
        }
        return $this->respond($this->dataModule);
    }

    //verify OTP 
    public function verifyOtp()
    {
        $requestData = $this->request->getJson();
        $admin_otp = $requestData->admin_otp;
        if (!empty($admin_otp)) {
            $sessionOtp = $this->session->get('otp');
            if ($sessionOtp == $admin_otp) {
                $data = array(
                    'message' => 'OTP verified successfully'
                );
                $this->dataModule = $this->success($data);
            } else {
                $this->session->setFlashdata('error', $this->failure(312)['error']['message']);
                $this->dataModule = $this->failure(312);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(303)['error']['message']);
            $this->dataModule = $this->failure(303);
        }
        return $this->respond($this->dataModule);
    }

    public function viewchart()
    {
        echo view('chart/chartwithform');
    }

    public function fetchMembertype()
    {
        $model = new Sitefunction();
        $this->dataModule['membertype'] = $model->get_all_rows(TBL_MEMBERS_TYPE, '*', array('status' => 1));
        echo view('admin/membertype', $this->dataModule);
    }

    public function editMembertype()
    {
        $requestData = $this->request->getJson();
        $membertypename = $requestData->membertypename;
        $id = $requestData->id;
        $adminID = $this->verify();
        if ($adminID != -1) {
            $model = new Sitefunction();
            $model->protect(false);
            $updateCheck =  $model->update_data(TBL_MEMBERS_TYPE, array('member_name' => $membertypename, 'updated' => $this->utc_time), array('id' => $id));
            if ($updateCheck) {
                $action = 'Admin ID ' . $adminID . ' and name ' . $this->session->get('admin_name') .  ' updated member type name ' . $membertypename;
                $this->addMemberlog($action);
                $data = array(
                    'message' => 'Member type updated successfully'
                );
                $this->dataModule = $this->success($data);
            }
        } else {
            $this->session->setFlashdata('error', $this->failure(302)['error']['message']);
            $this->dataModule = $this->failure(302);
        }
        return $this->respond($this->dataModule);
    }
}
