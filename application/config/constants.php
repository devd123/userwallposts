<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*  ====================== Custom Constants By Dev Sharma =========================== */


define('BASE_PATH','userwallposts/');
define('HTTP_PATH', "http://".$_SERVER['HTTP_HOST'].'/'.BASE_PATH);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/'.BASE_PATH);


/* ========================== Assets HTTP path ==============================*/

define('ASSETS_PATH', HTTP_PATH.'assets/');
define('IMG_PATH', ASSETS_PATH.'images/');
define('UPLOAD_PATH', ASSETS_PATH.'uploads/');
define('FONT_PATH', ASSETS_PATH.'fonts/');
define('CSS_PATH', ASSETS_PATH.'css/');
define('JS_PATH', ASSETS_PATH.'js/');


/*  ====================== Custom Constants By Dev Sharma =========================== */
/* End of file constants.php */
/* Location: ./application/config/constants.php */

