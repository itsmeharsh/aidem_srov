<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
 */
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
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
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/* -----URL-------- */

define('_PATH', substr(dirname(__FILE__), 0, -19));
define('_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(_PATH))));

define('SITE_PATH', _PATH . "/");
define('SITE_URL', _URL . "/");

define('DOMAIN_URL', 'http://' . $_SERVER['HTTP_HOST'].'/vros/vrosmedia');
define('SITE_UPD', 'uploads/');
define('SITE_IMG', 'themes/images/');
define('USER_IMG', DOMAIN_URL.'/uploads/user/');
define('USER_IMG_PATH', DOMAIN_URL.'/uploads/');

define('BUSINESS_IMG', DOMAIN_URL.'/uploads/business/');

define("ADMIN_USER_TYPE", serialize(array('u','d','a')));

define('ADMIN_MAIN_URL', DOMAIN_URL . '/admin/');
define('ADMIN_URL', DOMAIN_URL . '/assets/admin/');
define('ADMIN_CSS_URL', DOMAIN_URL . "/assets/admin/css/");
define('ADMIN_PLUGIN_URL', DOMAIN_URL . "/assets/admin/js/plugins/");
define('ADMIN_JS_URL', DOMAIN_URL . "/assets/admin/js/");
define('ADMIN_IMAGE_URL', DOMAIN_URL . "/assets/admin/images/");
define('ADMIN_IMAGE_PATH', SITE_PATH . "assets/admin/img/");
define('LOGO_IMAGE_THUMB_URL', DOMAIN_URL . "/assets/admin/images/logo/thumb");



/*------ Table name ------*/

define('TBL_USER', "users");
define('TBL_EVENT', "app_event");
define('TBL_EVENT_COMMENTS', "app_comment");
define('TBL_EVENT_ATTENDEE', "app_event_attendee");
define('TBL_FORMS', "tbl_forms");
define('TBL_FORM_FIELDS', "tbl_form_fields");
define('TBL_APP_MEDIA', "app_media");
define('TBL_APP_EVENT_LIKE', "app_event_like");
define('TBL_BUSINESS', "business");
define('TBL_CATEGORY', "category");
define('TBL_FRIENDS', "app_friends");
define('TBL_PRICELISTS_TB', "pricelist_tb");
define('TBL_OFFERS', "offers");
define('TBL_PAYMENT_MASTER', "payment_master_tb");
define('TBL_ADVERTISMENT', "advertise");
define('TBL_ADVERTISMENT_REVENUE', "advertise_revenue");
define('TBL_NOTIFICATION_MASTER', "notification_master");
define('TBL_TAXI_COMPANY', "texi_company");
define('TBL_TAXI_CLASS', "texi_class");

define('TBL_NEWS_CATEGORY', "news_category");
define('TBL_NEWS', "news");

define('TBL_CITY', "city");

define('TBL_FEEDBACK', "feedbacks");
define('TBL_ARTICLE', "tbl_articles");


