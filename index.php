<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */
 
if(version_compare(phpversion(), '5.2.4', '<') === true)
{
	exit('This application requires PHP version 5.2.4 or newer. Your PHP version is ' . phpversion());
}

define('BASE_PATH', realpath(dirname(__FILE__)));
define('APPLICATION_PATH', BASE_PATH . '/application');
define('LIBRARY_PATH', BASE_PATH . '/library');
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
define('DS', DIRECTORY_SEPARATOR);

set_include_path(LIBRARY_PATH . PATH_SEPARATOR . get_include_path());

require_once 'Zend/Application.php';

$application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/config/config.php');
$application->bootstrap()->run();
