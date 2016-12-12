<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Table\Quiz;

use Zend_Db_Table;

/**
 * Odzwierciedlenie tabeli listy wyników quizu
 *
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @table     quiz_wyniki
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Wyniki extends Zend_Db_Table
{    
    /**
     * Instancja singletonu
     *
     * @var Wyniki
     */
    protected static $instance;

    /**
     * Konstruktor
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            Zend_Db_Table::NAME => 'quiz_wyniki',
            Zend_Db_Table::ROW_CLASS => '\Row\Quiz\Wynik'
        ));
    } 

    /**
     * Zwraca instancje singletonu
     *
     * @return Wyniki
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof Wyniki) {
            self::$instance = new Wyniki();
        }

        return self::$instance;
    }
}
