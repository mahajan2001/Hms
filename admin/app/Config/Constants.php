<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
 * --------------------------------------------------------------------
 * Constants
 * --------------------------------------------------------------------
*/

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'hms');


//DOMAIN Paths
define('DOMAIN_URL', 'http://localhost/Hms/');
define('SITE_URL', DOMAIN_URL . "admin/");

//BASE Paths
define('DOMAIN_BASE_URL', $_SERVER['DOCUMENT_ROOT'] . '/Hms/');
define('BASE_URL', DOMAIN_BASE_URL . "admin/");

//Assets
define('ASSETSPATH', SITE_URL . 'public/assets/');

//Includes
define('INCLUDESPATH', BASE_URL . 'public/includes');

//Image Paths
define('IMAGE_UPLOAD_PATH', DOMAIN_BASE_URL . 'uploads/');
define('FETCH_IMAGE', DOMAIN_URL . 'uploads/');

//Video Paths
define('VIDEO_UPLOAD_PATH', DOMAIN_BASE_URL . '/uploads/');
define('FETCH_VIDEO', DOMAIN_URL . '/uploads/');

define("TBL_PREFIX", "tbl_");

//Table Variables

define("TBL_ADMIN", TBL_PREFIX .  "admin");
define("TBL_LOGS", TBL_PREFIX .  "logs");
define("TBL_MASTER_SETTINGS", TBL_PREFIX .  "master_settings");
define("TBL_CONTACT_US", TBL_PREFIX .  "contact_us");

//Paths
define('INDEX_PATH', SITE_URL . 'index');
define('LOGIN_PATH', SITE_URL . 'login');
define('DASHBOARD_PATH', SITE_URL . 'dashboard');

define('SUBADMIN_PATH', SITE_URL . 'subadmin');
define('ADMIN_PATH', SITE_URL . 'admins');
define('CONTACTUS_PATH', SITE_URL . 'Contact');
define('MASTER_PATH', SITE_URL . 'master');
define('LOGS_PATH', SITE_URL . 'logs');

define('LIVINGIN_PATH', SITE_URL . 'livingin');
define('LIVINGOUT_PATH', SITE_URL . 'livingout');
define('TEMPORARYDUTY_PATH', SITE_URL . 'temporaryduty');
define('GUESTBILL_PATH', SITE_URL . 'guestbill');



define('INVOICE_PATH', SITE_URL . 'invoice');
define('EXPENSE_PATH', SITE_URL . 'expense');
define('COURSEWISEMONTHLYBLL_PATH', SITE_URL . 'coursewisemonthlybill');

define('USER_PATH', SITE_URL . 'user');
define('TEMPORAYVACATION_PATH', SITE_URL . 'temporayvacation');
define('PERMANENTVACATION_PATH', SITE_URL . 'permanentvacation');
define('ROOM_PATH', SITE_URL . 'room');
define('GUESTAPPLICATION_PATH', SITE_URL . 'guestapplication');
define('REBATEFORM_PATH', SITE_URL . 'rebateform');
define('HOSTEL_PATH', SITE_URL . 'hostel');
define('MESSCHARGES_PATH', SITE_URL . 'messcharges');













//Log Constants

define('ADMIN',  1);
define('USER',  2);


//New Constants

define('OFFICER_PATH', SITE_URL . 'officer');
define('VENDOR_PATH', SITE_URL . 'vendors');

//Table variables

define("TBL_MEMBERS", TBL_PREFIX .  "members");
define("TBL_MONTHLY_MESS_DETAILS", TBL_PREFIX .  "monthlymessdetails");
define("TBL_INVOICE", TBL_PREFIX .  "invoice");
define("TBL_VENDORS", TBL_PREFIX .  "vendors");
define("TBL_EXPENSE", TBL_PREFIX .  "expense");
define("TBL_EXPENSE_DETAILS", TBL_PREFIX .  "expense_details");


define("TBL_USER_REGISTRATION", TBL_PREFIX .  "user_registration");
define("TBL_TEMPORARY_VACATION", TBL_PREFIX .  "temporary_vacation");
define("TBL_PERMANENT_VACATION", TBL_PREFIX .  "permanent_vacation");
define("TBL_TRANSACTION", TBL_PREFIX .  "transaction");
define("TBL_ROOM", TBL_PREFIX .  "room");
define("TBL_BEDS", TBL_PREFIX .  "beds");
define("TBL_HOSTEL", TBL_PREFIX .  "hostel");
define("TBL_BLOCK", TBL_PREFIX .  "block");
define("TBL_COURSES", TBL_PREFIX .  "courses");

define("TBL_SUB_COURSES", TBL_PREFIX .  "subcourses");
define("TBL_MESS_REBATE", TBL_PREFIX .  "mess_rebate");
define("TBL_MESS_CHARGES", TBL_PREFIX .  "mess_charges");















