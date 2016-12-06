<?php

/**
 *  Moduł administracyjny
 *
 *
 */

include_once 'BaseController.php';

/**
 * Kontroler domyślny modułu administracyjnego
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Administracja
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Admin_IndexController extends Admin_BaseController
{
    /**
     * Przekierowanie na listę quizów
     * 
     */
    public function indexAction()
    {
        $this->_helper->redirector->gotoSimple('lista', 'quiz');
    }

}
