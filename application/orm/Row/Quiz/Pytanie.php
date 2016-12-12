<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Row\Quiz;

use Zend_Db_Table_Row;

/**
 * Odzwierciedlenie wiersza z tabeli quiz_pytania
 *
 * Pojedyńcze pytanie
 *
 * PHP version 7.0
 *
 * @category  PHP
 * @table     quiz_pytania
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 *
 * @property int    $id         identyfikator główny
 * @property int    $id_quizu   klucz obcy - powiązanie z quizem
 * @property string $tresc      treść pytania
 */
class Pytanie extends Zend_Db_Table_Row
{
    
}
