<?php

class QuizControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
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
     * @covers QuizController::indexAction
     * @covers QuizController::listaAction
     */
    public function testIndexAction()
    {
        $this->dispatch('/quiz');
        $this->assertNotRedirect();
        $this->assertController('quiz');
        $this->assertAction('lista');

        $this->assertQuery('#quizes');        
        $this->assertQueryCount('#quizes .rozwiaz', 1); //jest tylko jeden quiz w danych testowych
    }

    /**
     * @covers QuizController::listaAction
     */
    public function testListaAction()
    {
        $this->dispatch('/quiz/lista');
        $this->assertNotRedirect();
        $this->assertController('quiz');
        $this->assertAction('lista');

        $this->assertQuery('#quizes');
        $this->assertQueryCount('#quizes .rozwiaz', 1); //jest tylko jeden quiz w danych testowych
    }

    /**
     * @covers QuizController::quizAction
     */
    public function testQuizAction()
    {
        $this->dispatch('/quiz/quiz/id/1');
        $this->assertNotRedirect();
        $this->assertController('quiz');
        $this->assertAction('quiz');

        $this->assertQuery('#pytania');
        $this->assertQueryCount('#pytania ol', 3); //są trzy pytania
    }

    /**
     * @covers QuizController::quizAction
     */
    public function testQuizWyjatekAAction()
    {
        $this->dispatch('/quiz/quiz');
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertQueryContentContains('pre', 'Brak quizu');
    }

    /**
     * @covers QuizController::quizAction
     */
    public function testQuizWyjatekBAction()
    {
        $this->dispatch('/quiz/quiz/id/2');//nieaktywny quiz        
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertQueryContentContains('pre', 'Brak quizu');
    }

    /**
     * @covers QuizController::quizAction          
     */
    public function testQuizWyjatekCAction()
    {
        $this->dispatch('/quiz/quiz/id/3');//brak takiego id
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertQueryContentContains('pre', 'Brak quizu');
    }

    /**
     * @covers QuizController::wynikAction
     */
    public function testWynikAction()
    {
        $this->request->setMethod('POST')
              ->setPost(array(
                  'odpowiedz' => array()
              ));

        $this->dispatch('/quiz/wynik/id/1');
        $this->assertNotRedirect();
        $this->assertController('quiz');
        $this->assertAction('wynik');

        $this->assertQueryContentContains('h1', 'Quiz Test');        
        $this->assertQueryContentContains('p', 'Niedostateczny');
    }

    /**
     * @covers QuizController::WynikAction
     * @covers \Model\ShowableException::__construct
     */
    public function testWynikWyjatekAAction()
    {
        $this->dispatch('/quiz/wynik/id/2');//nieaktywny quiz
        $this->assertController('error');
        $this->assertAction('error');
        $this->assertQueryContentContains('pre', 'Brak quizu');
    }
}