<?php

//session_start();

//------------------------------------------------ Server config --------------------------------------------------------------
switch ($_SERVER['SERVER_NAME']) {

    case 'studio.betweenbcn.com' :
    case 'http://studio.betweenbcn.com' :
        ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
        //error_reporting(0);
        ini_set('max_execution_time', 300);
        date_default_timezone_set('Europe/Madrid');

        define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');
        define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/');

        //MySQL Connection
        define('DBSERVER', 'localhost');
        define('DBUSERNAME', 'andromeda_studio');
        define('DBPASSWORD', 'asdo8sidm');
        define('DBSCHEMA', 'andromeda_studio');

        define('FUNCTION_DEBUG', false);
        define('SQL_DEBUG', false);
        break;

    default :
        ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
        //error_reporting(0);
        ini_set('max_execution_time', 300);
        date_default_timezone_set('Europe/Madrid');

        define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/between/');
        define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/between/');

        //MySQL Connection
        define('DBSERVER', 'localhost');
        define('DBUSERNAME', 'root');
        define('DBPASSWORD', '');
        define('DBSCHEMA', 'between');

        define('FUNCTION_DEBUG', false);
        define('SQL_DEBUG', false);
        break;
}



//------------------------------------------------ control definitions --------------------------------------------------------------

define('DEBUG_ENTER', "<br/>\n");

session_start();

//Conecto amb la bbdd
$conn = mysql_connect(DBSERVER, DBUSERNAME, DBPASSWORD);

//Selecciono la bbdd 
mysql_select_db(DBSCHEMA, $conn);


//------------------------------------------------ basic definitions ----------------------------------------------------------------
//define('PROJECT_NAME', 'url-kw');
//define ('HOST_EMAIL', 'mail.tecnitek.com');
//define('ACCOUNT_EMAIL', 'ocarreras@tecnitek.com');
//define('PASSWORD_EMAIL', 'carreraso');



//------------------------------------------------- autoloader dal define------------------------------------------------------------------------------

//function mi_autocargador($clase) {
//    include BASE_PATH . 'dal/' . strtolower($clase) . '_db.php';
//}
//
//spl_autoload_register('mi_autocargador');

//------------------------------------------------ instanciar controlador bbdd ----------------------------------------------------------------------
//require_once BASE_PATH . 'includes/functions.php';
//require_once BASE_PATH . 'dal/database.php';
//------------------------------------------------ load basics ----------------------------------------------------------------------

//$class_settings = new Settings();
//$settings = $class_settings->getPairs();