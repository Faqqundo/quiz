<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Table;

use Zend_Db_Table;

/**
 * Odzwierciedlenie tabeli listy quizów
 *
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Quiz extends Zend_Db_Table
{    
    /**
     * Instancja singletonu
     *
     * @var Posiedzenia
     */
    protected static $instance;

    /**
     * Konstruktor
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            Zend_Db_Table::NAME => 'quiz',
            Zend_Db_Table::ROW_CLASS => '\Row\Quiz'
        ));
    }

    /**
     * Zwraca listę przyszłych posiedzeń
     *
     * @return \Row\Quiz[]
     */
    public function listaAktywnych() {
        return $this->fetchAll(array(
            'aktywny' => 1
        ));
    }    

    /**
     * Zwraca instancje singletonu
     *
     * @return Quiz
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof Quiz) {
            self::$instance = new Quiz();
        }

        return self::$instance;
    }
}
