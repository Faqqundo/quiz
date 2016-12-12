<?php

/**
 *  Moduł obsługi quiz
 *
 *
 */

namespace Row\Quiz\Pytanie;

use Zend_Db_Table_Row;

/**
 * Odzwierciedlenie wiersza z tabeli quiz_pytania_odpowiedzi
 *
 * Pojedyńcza odpowiedź
 *
 * PHP version 7.0
 *
 * @category  PHP
 * @table     quiz_pytania_odpowiedzi
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 *
 * @property int    $id         identyfikator główny
 * @property int    $id_pytania klucz obcy - powiązanie z pytaniem quizu
 * @property string $tresc      treść odpowiedzi
 * @property int    $wartosc    punkty przyznane za tą odpowiedź
 */
class Odpowiedz extends Zend_Db_Table_Row
{
    /**
     * Zwraca odpowiedź bez wartości - tak aby przy serializacji do np JSONa i przesłaniu
     * dalej do przeglądarki punktacja została utajniona
     *
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        unset($array['wartosc']);//
        return $array;
    }
}
