<?php

/**
 *  Moduł ogólny
 *
 *
 */

/**
 * Kontroler bazowy do dziedziczenia
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Default
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
abstract class BaseController extends Zend_Controller_Action
{    
    /**
     * Jak ktoś błądzi, to przekierowujemy na początek
     *
     */
    public function indexAction()
    {
        $this->_helper->redirector->gotoSimple('index', 'index', 'index');
    }

}
