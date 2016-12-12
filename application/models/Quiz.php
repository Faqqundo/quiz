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
     * Konstruktor zasadniczy
     *
     */
    public function __construct()
    {
     
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
