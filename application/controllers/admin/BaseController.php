<?php

/**
 *  Moduł administracyjny
 *
 *
 */

include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'BaseController.php';

/**
 * Kontroler bazowy do dziedziczenia modułu administracyjnego
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Administracja
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
abstract class Admin_BaseController extends BaseController {

    /**
     * Dane zalogowanego użytkownika
     *
     * @var stdClass|null
     */
    protected $uzytkownik;

    /**
     * Inicjacja kontrolera
     *
     */
    public function init()
    {
        parent::init();

        $this->uzytkownik = \Model\Auth::getInstance()->getZalogowany();
    }

    public function preDispatch()
    {
        parent::preDispatch();

        if (!$this->uzytkownik
            && !(
                $this->getRequest()->getControllerName() === 'uzytkownik'
                && $this->getRequest()->getActionName() === 'login'
            )
        ) {
            return $this->forward('login', 'uzytkownik');
        }
    }

    /**
     * Jak ktoś błądzi, to przekierowujemy na początek
     *
     */
    public function indexAction()
    {
        $this->_helper->redirector->gotoSimple('index', 'index');
    }
}
