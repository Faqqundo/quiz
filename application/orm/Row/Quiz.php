<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Row;

use Zend_Db_Table_Row;

/**
 * Odzwierciedlenie wiersza z tabeli quiz
 *
 * Pojedyńczy quiz
 *
 * PHP version 7.0
 *
 * @category  PHP
 * @table     quiz
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 *
 * @property int    $id         identyfikator główny
 * @property string $data_utworzenia    data utworzenia w formacie RRRR-MM-DD GG:MM:SS
 * @property int    $aktywny    czy aktywny
 * @property string $nazwa 
 */
class Quiz extends Zend_Db_Table_Row
{

    /**
     * Zwraca listę pytań quizu
     *
     * @return Quiz\Pytanie[]
     */
    public function getPytania()
    {
        $pytania = \Table\Quiz\Pytania::getInstance()->fetchAll(array(
            'id_quizu = ?' => $this->id
        ));

        return $pytania;
    }
}
