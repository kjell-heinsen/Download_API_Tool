<?php


//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
error_reporting(0);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', 'php-errors.log');
const ENVIRONMENT = 'release';
const xPAGEPATH = '';
$wartung = false;


require_once "../autoload.php";
use downapitool\app\core\main;
use downapitool\app\helpers\session;
use downapitool\app\core\logger;
use downapitool\appversion;

ini_set('session.cookie_secure',1);
ini_set('session.cookie_httponly',1);
ini_set('session.cookie_samesite', 'Strict');
session_start();
if (ENVIRONMENT === 'dev') {
    require '../dev_config.php';
}
if (ENVIRONMENT === 'release') {
    require '../config.php';
}

$wordpress = false;
if (defined('PAGEPATH'))
{
    $wordpress = true;
}

if($wordpress) {
    require_once PAGEPATH . 'wp-load.php';
}


$buffer     = '';
$path = DOCROOT.'/index/static';
require_once DOCROOT . '/funktionen/funktionen.php';


    ob_start();

if ($wartung) {
    require_once('maintenance.php');
} else {

    if (defined('ENVIRONMENT')) {
        switch (ENVIRONMENT) {
            case 'development':
                error_reporting(E_ALL);
                break;
            case 'release':
               error_reporting(0);
                break;
            default:
                exit('The application environment is not set correctly.');
        }
    }

    set_exception_handler('downapitool\app\core\logger::exception_handler');
    set_error_handler('downapitool\app\core\logger::error_handler');
    define('FILEVERSION',appversion::get());
    define('VERSIONTIME','heute');
    $app = new main();
    $app->setController('start');
    $app->init();

}
ob_flush();