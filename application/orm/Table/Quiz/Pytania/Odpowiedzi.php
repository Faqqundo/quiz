<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Table\Quiz\Pytania;

use Zend_Db_Table;

/**
 * Odzwierciedlenie tabeli listy odpowiedzi na pytanie quizu
 *
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @table     quiz_pytania_odpowiedzi
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Odpowiedzi extends Zend_Db_Table
{    
    /**
     * Instancja singletonu
     *
     * @var Odpowiedzi
     */
    protected static $instance;

    /**
     * Konstruktor
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            Zend_Db_Table::NAME => 'quiz_pytania_odpowiedzi',
            Zend_Db_Table::ROW_CLASS => '\Row\Quiz\Pytanie\Odpowiedz'
        ));
    } 

    /**
     * Zwraca instancje singletonu
     *
     * @return Odpowiedzi
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof Odpowiedzi) {
            self::$instance = new Odpowiedzi();
        }

        return self::$instance;
    }
}
