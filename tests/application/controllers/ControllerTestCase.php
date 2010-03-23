<?php
/**
 *  @version ##VERSION##
 *  @package ##PACKAGE##
 *  @filesource
 */
/**
 * includes
 */
require_once 'Zend/Application.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
/**
 * @package ##PACKAGE##
 * @subpackage tests
 */
abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
    protected $application;
    public function setUp ()
    {
        $this->bootstrap = array($this , 'appBootstrap');
        parent::setUp();
    }
    public function tearDown ()
    {
        $this->resetRequest();
        $this->resetResponse();
        parent::tearDown();
    }
    public function appBootstrap ()
    {
        $this->application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        $this->application->bootstrap();
    }
}