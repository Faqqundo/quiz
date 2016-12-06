<?php

/**
 *  Moduł ogólny
 *
 *
 */

include_once 'BaseController.php';

use Model\ShowableException;

/**
 * Kontroler obsługi błędóœ
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Default
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class ErrorController extends BaseController
{
    /**
     * Tutaj nie powinno się wchodzić
     *
     */
    public function indexAction()
    {
        //todo!
    }

    /**
     * Tutaj następuje przekierowanie w razie wystąpienia błędu w aplikacji
     *
     */
    public function errorAction()
    {
        $this->view->info = 'Wystąpił błąd aplikacji, żądanie nie zostało obsłużone poprawnie.';
        //todo zapisz bład do bazy

        if($this->hasParam('error_handler') && $this->getParam('error_handler')->exception) {
            $exception = $this->getParam('error_handler')->exception;

            if (APPLICATION_ENV !== 'production') {
                if($exception instanceof ShowableException) {
                    $this->view->info = $exception->getMessage();
                } else {
                    $this->view->info = (string)$exception;
                }
            }
        }
    }

}
