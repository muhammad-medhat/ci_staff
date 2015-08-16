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

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Table names
|--------------------------------------------------------------------------
|
|
*/


define('faculties_table', 'faculties');
define('degrees_table', 'degrees');
define('staff_email_table', 'email');
define('staff_table', 'staff');
define('sections_table', 'sections');
define('publications_table', 'publications');
define('pubauth_table', 'pubauth');

/*
|--------------------------------------------------------------------------
| other constants 
|--------------------------------------------------------------------------
|
|
*/
//define('pubs_url', 'http://www.portal.alexu.edu.eg/index.php/ar/alexu-publications/');
define('auth_url', 'http://www.portal.alexu.edu.eg/index.php/ar/%D8%A7%D9%84%D8%A8%D8%AD%D8%AB-%D8%A7%D9%84%D8%B9%D9%84%D9%85%D9%89/alexu-publications/author');
define('general_limit', 5);
define('admin_limit', 50);
define('uploads_folder', 'uploads');
define('thumbs_folder', 'thumbs');

/* End of file constants.php */
/* Location: ./system/application/config/constants.php */
