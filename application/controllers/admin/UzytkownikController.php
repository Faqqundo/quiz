<?php

use Model\Auth;

/**
 *  Moduł administracyjny
 *
 *
 */

include_once 'BaseController.php';

/**
 * Kontroler obsługi użytkownika modułu administracyjnego
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Administracja
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Admin_UzytkownikController extends Admin_BaseController
{
    /**
     * Logowanie
     *
     */
    public function loginAction() {
        if ($this->uzytkownik) {
            $this->_helper->redirector->gotoSimple('index', 'index');
            return;
        }

        // docelowy adres
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $email = $this->getParam('email', 'biuro@informatio.pl');
        $result = null;

        // przesłane dane logowania
        if ($email && $this->hasParam('haslo')) {
            $result = Auth::getInstance()->login(
                $email, $this->getParam('haslo')
            );
            
            if ($result->isValid()) {
                $this->_redirect($url);
                return;
            }
        }

        $this->view->result = $result;
        $this->view->email = $email;
    }

    /**
     * Wylogowanie
     *
     */
    public function logoutAction()
    {
        if ($this->uzytkownik) {
            Auth::getInstance()->logout();
        }

        $this->_helper->redirector->gotoSimple('index', 'index', 'index');//daleko daleko
    }
}
