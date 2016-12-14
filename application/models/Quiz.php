<?php

/**
 *  Moduł obsługi quizu
 *
 *
 */

namespace Model;

/**
 * Model ogólny quizu
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Quiz
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Quiz
{
    /**
     * Singleton instance     
     *
     * @var Quiz
     */
    protected static $instance;

    /**
     * Zlicza punkty z odpowiedzi quizu, sprawdza czy nie było malwersacji
     *
     * @param \Row\Quiz $quiz
     * @param array $odpowiedzi
     * @return int
     * @throws \Exception
     */
    public function policzPunkty(\Row\Quiz $quiz, array $odpowiedzi)
    {
        $punkty = 0;
        $tablePytania = \Table\Quiz\Pytania::getInstance();
        $tableOdpowiedzi = \Table\Quiz\Pytania\Odpowiedzi::getInstance();

        //natura tabli nie powinna pozwolić na duplikacje pytań
        foreach ($odpowiedzi as $idPytania => $idOdpowiedzi) {
            /* @var $pytanie \Row\Quiz\Pytanie */
            $pytanie = $tablePytania->fetchRow(array(
                'id = ?' => $idPytania
            ));
            /* @var $odpowiedz \Row\Quiz\Pytanie\Odpowiedz */
            $odpowiedz = $tableOdpowiedzi->fetchRow(array(
                'id = ?' => $idOdpowiedzi
            ));

            if (!$pytanie || !$odpowiedz) {
                throw new \Exception('Wystąpił błąd - błędnie przekazane id');
            }

            if ($pytanie->id_quizu !== $quiz->id || $odpowiedz->id_pytania !== $pytanie->id) {
                throw new \Exception('Wystąpił błąd - pytanie nie należy do rozwiązywanego quizu lub odpowiedź nie należy do pytania');
            }

            $punkty += (int)$odpowiedz->wartosc;
        }

        return $punkty;
    }

    /**
     * Przydziela wynik/ocenę wypełnienia quizu na podstawie pola od
     *
     * @param \Row\Quiz $quiz
     * @param int $iloscPunktow
     * @return \Row\Quiz\Wynik
     * @throws Exception
     */
    public function przydzielWynik(\Row\Quiz $quiz, $iloscPunktow)
    {
        $wynik = \Table\Quiz\Wyniki::getInstance()->fetchRow(array(
            'id_quizu = ?' => $quiz->id,
            'od <= ?' => $iloscPunktow
        ), 'od desc');

        if (!$wynik) {
            throw new \Exception('Nieprawidłowo ułożone wyniki quizu - nie można przydzielić wyniku dla podanej liczby punktów');
        }

        return $wynik;
    }

    /**
     * Singleton instance
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
