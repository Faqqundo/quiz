<?php

class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
    {
        protected function setUp(){
        $this->bootstrap = array($this, 'appBootstrap');
        parent::setUp();
    }

    public function appBootstrap(){
        $this->application = new Zend_Application(APPLICATION_ENV,
                                                  APPLICATION_PATH . '/configs/application.ini');

        $this->application->getBootstrap()->getPluginResource('frontcontroller')->init();
        $this->application->getBootstrap()->getPluginResource('view')->init();
        
        Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')
            // podział widoków na moduły
            ->setViewScriptPathSpec(':module/:controller/:action.:suffix');
    }

    /**
     * @covers IndexController::indexAction
     */
    public function testIndexAction()
    {
        $this->dispatch('/');
        $this->assertNotRedirect();
        $this->assertController('quiz');
        $this->assertAction('lista');
    }        
}