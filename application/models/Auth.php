<?php

/**
 *  Moduł ogólny
 *
 *
 */

namespace Model;

use stdClass;
use Zend_Auth;
use Zend_Auth_Adapter_Interface;
use Zend_Auth_Result;
use Zend_Registry;

/**
 * Model uwierzytelniania
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Administracja
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Auth
{
    /**
     * Singleton instance     
     *
     * @var Auth
     */
    protected static $instance;

    /**
     * Zalogowany użytkownik lub null
     *
     * @var stdClass|null
     */
    protected $uzytkownik;

    /**
     * Konstruktor klasy
     */
    public function __construct()
    {
        $this->uzytkownik = Zend_Auth::getInstance()->getIdentity();
    }

    /**
     * Logowanie użytkownika
     *
     * @param string $email
     * @param string $haslo
     * @return Zend_Auth_Result
     */
    public function login($email, $haslo) {
        $this->uzytkowni = null;

        /* @var $authAdapter Zend_Auth_Adapter_Interface */
        $authAdapter = Zend_Registry::get('auth_adapter');

        $authAdapter
                ->setIdentity($email)
                ->setCredential(sha1('okon' . $haslo));

        $result = Zend_Auth::getInstance()->authenticate($authAdapter);

        if ($result->isValid()) {
            $this->uzytkownik = $result->getIdentity();
        }        

        return $result;
    }

    /**
     * Wylogowuje zalogowanego użytkownika.
     *
     */
    public function logout()
    {
        Zend_Auth::getInstance()->clearIdentity();

        $this->uzytkownik = null;
    }

    /**
     * Zwraca zalogowanego użytkownika lub null
     * 
     * @return stdClass|null
     */
    public function getZalogowany()
    {
        return $this->uzytkownik;
    }

    /**
     * Singleton instance
     *
     * @return Auth
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof Auth) {
            self::$instance = new Auth();
        }

        return self::$instance;
    }
}
