<?php

/**
 *  Moduł administracyjny - quiz
 *
 *
 */

include_once 'BaseController.php';

/**
 * Kontroler administracyjny quizu
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Administracja/Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Admin_QuizController extends Admin_BaseController
{
    /**
     * Przekierowanie na listę quizów
     * 
     */
    public function indexAction()
    {
        $this->_helper->redirector->gotoSimple('lista');
    }

    /**
     * Lista quizów
     *
     */
    public function listaAction()
    {
        
    }

}
