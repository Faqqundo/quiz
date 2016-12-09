<?php

/**
 *  Moduł Quiz
 *
 *
 */

include_once 'BaseController.php';

/**
 * Kontroler obsługi quizów przez klienta
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class QuizController extends BaseController
{
    /**
     * Punkt startowy quizów -> przekierowanie na listę quizów do rozwiązania
     *
     */
    public function indexAction()
    {
        $this->forward('lista');
    }

    /**
     * Lista quizów do rozwiązania
     * 
     */
    public function listaAction()
    {
        $this->view->quizes = Table\Quiz::getInstance()->listaAktywnych();        
    }

    /**
     * Wypełnianie quizu
     *
     */
    public function quizAction()
    {

    }

    /**
     * Prezentacja wyniku uzupełnionego quizu
     *
     */
    public function wynikAction()
    {

    }
}
