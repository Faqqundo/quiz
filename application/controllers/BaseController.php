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


    public function init()
    {
        parent::init();

        $this->view->styles = array(
            '/libs/jquery-ui-1.12.1.custom/jquery-ui.min'
        );
        
        $this->view->scripts = array(
            '/libs/jquery-3.1.1.min',
            '/libs/jquery-ui-1.12.1.custom/jquery-ui.min'
        );

        $this->view->scriptVars = array();
    }

    /**
     * Jak ktoś błądzi, to przekierowujemy na początek
     *
     */
    public function indexAction()
    {
        $this->_helper->redirector->gotoSimple('index', 'index', 'index');
    }

    /**
     * Dodaje styl do widoku
     * 
     * @param string $file bez rozszerzenia
     */
    protected function addStyle($file)
    {
        $this->view->styles[] = $file;
    }

    /**
     * Dodaje skrypt do widoku
     *
     * @param string $file bez rozszerzenia
     */
    protected function addScript($file)
    {
        $this->view->scripts[] = $file;
    }

    /**
     * Dodaje zmienną JS do widoku
     *
     * @param string $nazwa
     * @param mixed $wartosc
     */
    protected function setScriptVar($nazwa, $wartosc)
    {
        $this->view->scriptVars[$nazwa] = $wartosc;
    }
}
