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

        $this->addScript('/scripts/quiz/lista');
    }

    /**
     * Wypełnianie quizu
     *
     */
    public function quizAction()
    {
        /* @var $quiz \Row\Quiz */
        $quiz = \Table\Quiz::getInstance()->find($this->getParam('id'))->current();
        if (!$quiz) {
            throw new Model\ShowableException('Brak quizu, proszę skorzystać z nawigacji');
        }

        $this->view->quiz = $quiz;
        $this->view->pytania = $quiz->getPytania();

        $this->addScript('/scripts/quiz/quiz');
    }

    /**
     * Prezentacja wyniku uzupełnionego quizu
     *
     */
    public function wynikAction()
    {

    }
}
