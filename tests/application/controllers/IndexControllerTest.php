<?php
/**
 *  @version ##VERSION##
 *  @package ##PACKAGE##
 *  @filesource
 */
/**
 *  @package ##PACKAGE##
 */
class IndexControllerTest extends ControllerTestCase {

    public function testIndexAction()
    {
        $this->dispatch('/');
        $this->assertResponseCode(200);
        $this->assertAction('index');
        $this->assertController('index');
        $this->assertModule('default');
    }

}

