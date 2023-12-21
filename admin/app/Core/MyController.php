<?php

namespace App\Core;

use App\Core\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sitefunction;
use DateTime;
use Exception;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MyController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->utc_time = date('Y-m-d H:i:s');
        $this->utc_date = date('Y-m-d');

        $this->statuscodes = array(
            300 => "Invalid Credentials",
            301 => "Account Deactivated",
            302 => "Authorization Failed",
            303 => "Data Missing",
            304 => "Email id and contact already exists",
            305 => "Admin Not Registered",
            306 => "Invalid URL Format",
            307 => "Contact already exists",
            308 => "Email or contact already exists",
            309 => "Details not updated",
            310 => "New password and confirm password does'nt match",
            311 => "Error while adding the data",
            312 => 'OTP is Invalid',
            313 => 'Subadmin ID doesnt exists',
            314 => 'Survey ID doesnt exists',
            315 => 'Voter enrollment details already exists',
            316 => 'Project code already exists',
            317 =>  'Unit name already exists',
            318 =>  'Parameter name already exists',
            319 =>  'Tool Code already exists',
            320 =>  'Tool is already added in the inventory',
            404 => 'Invalid Api Call',
            334 => 'Operation code already exists',
            335 =>  'This operation is already been allocated to tool',
            340 => 'Machine code already exists',
            341 => 'This Project is already been allocated to company',
            344 => 'This Company is already been allocated to Site Engineer',
            343 => 'This Company is already been allocated to Procurement Member',
            342 => 'This Tool is already been allocated to parameter',
            350 => 'Component code already exists',
            351 => 'This machine is already been allocated to operation',
            352 => 'Shift name already exists',
            360 => 'This tool is already been allocated to company',
        );
        //vishal :330
        // pratiksha :340
        //rutuja :350
        //kumar: 360
        //sukrut:320
        $model = new Sitefunction();
        $this->dataModule = array();
    }

    public function checkLogin()
    {
        $adminID = $this->session->get('admin_id');
        if (empty($adminID)) {
            return "-1";
        } else {
            $adminName = $this->session->get('admin_name');
            return $adminName;
        }
    }

    function addMemberlog($action)
    {
        $model = new Sitefunction();
        $model->protect(false);
        $log_data = array();
        $log_data['of_id'] = $this->session->get('admin_id');
        $log_data['log_of'] = ADMIN;
        $log_data['action'] = $action;
        $log_data['status'] = 1;
        $log_data['created'] = $this->utc_time;
        $log_data['updated'] = $this->utc_time;
        $model->insert_data(TBL_LOGS, $log_data);
    }
    public function getDateFormat($date)
    {
        $date1 = new DateTime($date);
        $date2 = new DateTime("now");
        $interval = $date1->diff($date2);
        $finaldate = "";
        if ($interval->y != 0) {
            $finaldate = $interval->y . " years ago";
        } else if ($interval->m != 0) {
            $finaldate = $interval->m . " months ago";
        } else if ($interval->d != 0) {
            $finaldate = $interval->d . " days ago";
        } else if ($interval->h != 0) {
            $finaldate = $interval->h . " hours ago";
        } else if ($interval->i != 0) {
            $finaldate = $interval->i . " minutes ago";
        } else if ($interval->s != 0) {
            $finaldate = $interval->s . " seconds ago";
        }

        return $finaldate;
    }

    public function getKey()
    {
        return "my_application_secret";
    }

    public function getCipher()
    {
        $ciphering = 'AES-128-CTR';
        return $ciphering;
    }

    public function getEncryptioniv()
    {
        $encryption_iv = '1234567891011121';
        return $encryption_iv;
    }

    public function encryptdata($encryptData)
    {
        $encrypteddata = openssl_encrypt($encryptData, $this->getCipher(), $this->getKey(), 0, $this->getEncryptioniv());
        return $encrypteddata;
    }

    public function decryptdata($decryptData)
    {
        $decryptedData = openssl_decrypt($decryptData,  $this->getCipher(), $this->getKey(), 0, $this->getEncryptioniv());
        return $decryptedData;
    }

    function success($json)
    {
        $jsonData = array(
            "success" => true,
            "payload" => $json,
            "error" => array(
                "code" => 0,
                "message" => "",
            ),
        );

        return $jsonData;
    }

    function failure($error_code, $message = "")
    {
        $jsonData = array(
            "success" => false,
            "payload" => (object)array(),
            "error" => array(
                "code" => $error_code,
                "message" => $message == "" ? $this->statuscodes[$error_code] : $message,
            ),
        );

        return $jsonData;
    }

    function verify()
    {
        $key = $this->getKey();
        $authHeader = $this->request->header("Authorization");
        $authHeader = $authHeader->getValue();
        $token = $authHeader;
        $userId = -1;
        try {
            $decoded = JWT::decode($token, new Key($key, "HS256"));
            $userId = $decoded->data;
        } catch (Exception $ex) {
            return $userId;
        }
        return $userId;
    }

    public function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('hmc@diat.ac.in', 'DIAT');

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function sendTestMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('mail_id', 'Project_name');

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return "IF : " . $email->printDebugger(['headers']);
        } else {
            return "Else : " . $email->printDebugger(['headers']);
        }
    }

    public function generateOTP()
    {

        $generator = "1357902468";
        $n = 4;
        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }

    function generateRandomPassword() {
        // Define character sets
        $digits = '0123456789';
        $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $smallLetters = 'abcdefghijklmnopqrstuvwxyz';
        $specialSymbols = '!@#$%^&*()-_=+[]{}|;:,.<>?';
    
        // Generate one character from each character set
        $randomDigit = $digits[random_int(0, strlen($digits) - 1)];
        $randomCapitalLetter = $capitalLetters[random_int(0, strlen($capitalLetters) - 1)];
        $randomSmallLetter = $smallLetters[random_int(0, strlen($smallLetters) - 1)];
        $randomSpecialSymbol = $specialSymbols[random_int(0, strlen($specialSymbols) - 1)];
    
        // Concatenate the characters to form the password
        $password = $randomDigit . $randomCapitalLetter . $randomSmallLetter . $randomSpecialSymbol;
    
        // Shuffle the password to randomize the order
        $password = str_shuffle($password);
    
        return $password;
    }

    public function generateOTPSixDigit()
    {

        $generator = "1357902468";
        $n = 6;
        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }

    public function randomReferralcode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomstr = '';
        for ($i = 0; $i < random_int(6, 6); $i++) {
            $randomstr .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomstr;
    }

    public function sendmailtouser($email_id, $subject, $body)
    {
        // $model = new Sitefunction();
        // $model->protect(false);
        // $data = $model->get_single_row(TBL_EMAIL_PROMOTION, "*", array('id' => $email_id));
        $model = new Sitefunction();
        $data = $model->get_single_row(TBL_MASTER_SETTINGS, "*", array('id' => 1));
        $email = \Config\Services::email();
        try {
            //Recipients
            $email->setFrom('hmc@diat.ac.in', $data['project_name']);
            $email->setTo($email_id);         // Add a recipient
            $email->setReplyTo('hmc@diat.ac.in');

            // Attachments
            /*$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/       // Optional name

            // Content
            //$email->isHTML(true);                                                                   // Set email format to HTML
            $email->setSubject($subject);
            $email->setMessage("<!DOCTYPE html
                        PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en-GB'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>XloGist</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <style type='text/css'>
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>

</head>

<body style='margin: 0; padding: 0;'>
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
        <tr>
            <td style='padding: 20px 0 30px 0;'>

                <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' style='border-collapse: collapse; border: 1px solid #cccccc;'>
                    <tr>
                        <td align='center' bgcolor='#ffffff' style='padding: 20px 0 30px 0;'>
                            <img src='" . FETCH_IMAGE  . $data['project_logo']  . "' alt='" . $data['project_name'] . "' width='40%' height='100%' style='display: block;' />
                            <hr>
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                <tr>
                                    <td style='color: #153643; font-family: Arial, sans-serif;'>
                                        <h1 style='font-size: 20px; margin: 0;'>" . $subject . "</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;'>
                                        <p style='margin: 0;white-space:pre'>" . $body . "</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='260' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                            <tr>
                                                <td style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0; float: right;'>
                                                    <p style='margin: 0;'>Thanks and Regards
                                                        <br> Team " . $data['project_name'] . ".
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#283028' style='padding: 30px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                <tr>
                                    <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;'>
                                        <p style='margin: 0;'>

                                            <p>Tel: +91 123467890 <br> Email : contact@tms.co </p>
                                            <a href='" . FETCH_IMAGE  . $data['project_logo']  . "' style='color: #ffffff;'>" . $data['project_name'] . "</a>
                                        </p>
                                    </td>
                                    <td align='right'>
                                        <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse;'>
                                            <tr>

                                                <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>");

            $email->send();
        } catch (Exception $e) {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function sendmailtouserAttachment($email_id, $subject, $body, $attachment)
    {
        $model = new Sitefunction();
        $data = $model->get_single_row(TBL_MASTER_SETTINGS, "*", array('id' => 1));
        $email = \Config\Services::email();
        try {
            //Recipients
            $email->setFrom('developeraira@gmail.com', $data['project_name']);
            $email->setTo($email_id);         // Add a recipient
            $email->setReplyTo('developeraira@gmail.com');

            // Attachments
            /*$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/       // Optional name


            if ($attachment != "NA") {
                $isattached = "<tr>
                <td>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                <tr>
                <td width='400' height='400' valign='top'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                <tr>
                <td align='center'>
                <a href='" . FETCH_IMAGE . "promotion/" . $attachment . "' alt='' width='90%' height='90%' style='display: block;'> Click to view Attachment
                 </a>
                </td>
                </tr>
                
                </table>
                </td>
                <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
                
                </tr>
                </table>
                </td>
                </tr>";
            } else {
                $isattached = "";
            }


            // Content
            //$email->isHTML(true);                                                                   // Set email format to HTML
            $email->setSubject($subject);
            $email->setMessage("<!DOCTYPE html
                        PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en-GB'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>XloGist</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <style type='text/css'>
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>

</head>

<body style='margin: 0; padding: 0;'>
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
        <tr>
            <td style='padding: 20px 0 30px 0;'>

                <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' style='border-collapse: collapse; border: 1px solid #cccccc;'>
                    <tr>
                        <td align='center' bgcolor='#ffffff' style='padding: 20px 0 30px 0;'>
                            <img src='" . FETCH_IMAGE  . $data['project_logo']  . "' alt='" . $data['project_name'] . "' width='200' height='80' style='display: block;' />
                            <hr>
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                <tr>
                                    <td style='color: #153643; font-family: Arial, sans-serif;'>
                                        <h1 style='font-size: 20px; margin: 0;'>" . $subject . "</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;'>
                                        <p style='margin: 0;white-space:pre'>" . $body . "</p>
                                    </td>
                                </tr>
                                " . $isattached . "
                                <tr>
                                    <td width='260' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                            <tr>
                                                <td style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0; float: right;'>
                                                    <p style='margin: 0;'>Thanks and Regards
                                                        <br> Team " . $data['project_name'] . ".
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#283028' style='padding: 30px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                                <tr>
                                    <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;'>
                                        <p style='margin: 0;'>

                                            <p>Tel: +91 123467890 <br> Email : contact@tms.co </p>
                                            <a href='" . FETCH_IMAGE  . $data['project_logo']  . "' style='color: #ffffff;'>" . $data['project_name'] . "</a>
                                        </p>
                                    </td>
                                    <td align='right'>
                                        <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse;'>
                                            <tr>

                                                <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>");

            $email->send();
        } catch (Exception $e) {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function fetchProjectDetails(){
        $model = new Sitefunction();
        $result = $model->get_single_row(TBL_MASTER_SETTINGS, '*');
        return $result;
    }


}
