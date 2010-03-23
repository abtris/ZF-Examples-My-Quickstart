<?php
/**
 *  @version ##VERSION##
 *  @package ##PACKAGE##
 *  @filesource
 */
// timezone
date_default_timezone_set('Europe/Prague');

error_reporting( E_ALL | E_STRICT );

define('BASE_PATH', realpath(dirname(__FILE__) . '/../../'));
define('APPLICATION_PATH', BASE_PATH . '/application');


// Include path
set_include_path(
    '.'
    . PATH_SEPARATOR . BASE_PATH . '/library'
    . PATH_SEPARATOR . get_include_path()
);


// Define application environment
define('APPLICATION_ENV', 'testing');

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run

require_once 'controllers/ControllerTestCase.php';
