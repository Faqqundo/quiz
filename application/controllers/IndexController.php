<?php

/**
 *  Moduł ogólny
 *
 *
 */

include_once 'BaseController.php';

/**
 * Kontroler domyślny
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Default
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class IndexController extends BaseController
{
    /**
     * Punkt startowy aplikacji -> przekierowanie na listę quizów do rozwiązania
     * 
     */
    public function indexAction()
    {
        $this->forward('lista', 'quiz');
    }

}
