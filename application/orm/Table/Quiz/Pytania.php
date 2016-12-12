<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Table\Quiz;

use Zend_Db_Table;

/**
 * Odzwierciedlenie tabeli listy pytań quizu
 *
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @table     quiz_pytania
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Pytania extends Zend_Db_Table
{    
    /**
     * Instancja singletonu
     *
     * @var Pytania
     */
    protected static $instance;

    /**
     * Konstruktor
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            Zend_Db_Table::NAME => 'quiz_pytania',
            Zend_Db_Table::ROW_CLASS => '\Row\Quiz\Pytanie'
        ));
    } 

    /**
     * Zwraca instancje singletonu
     *
     * @return Pytania
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof Pytania) {
            self::$instance = new Pytania();
        }

        return self::$instance;
    }
}
