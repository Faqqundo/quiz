<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Row\Quiz;

use Zend_Db_Table_Row;

/**
 * Odzwierciedlenie wiersza z tabeli quiz_wyniki
 *
 * Pojedyńczy wynik (ocena wypełnienia)
 *
 * PHP version 7.0
 *
 * @category  PHP
 * @table     quiz_wyniki
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 *
 * @property int    $id         identyfikator główny
 * @property int    $id_quizu   klucz obcy - powiązanie z quizem
 * @property int    $od         od ilu punktów można przyznać
 * @property string $nazwa      nazwa wyniku/oceny
 */
class Wynik extends Zend_Db_Table_Row
{
    
}
