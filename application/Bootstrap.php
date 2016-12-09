<?php

/**
 *  Moduł ogólny
 *
 *
 */

/**
 * Starter aplikacji
 *
 * PHP version 7.0
 *
 *
 * @category  PHP
 * @package   Default
 * @author    Mariusz Wintoch <biuro@informatio.pl>
 * @copyright 2016 (c) Informatio, Mariusz Wintoch
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * Inicjacja konfiguracji
     *
     * @return array
     */
    protected function _initConfig()
    {
        $config = $this->getOptions();
        Zend_Registry::set('config', $config);//konfig w formie tablicy - raz czytany, wielokrotnie odtwarzany:)
        return $config;
    }
  
    /**
     * Inicjalizacja i konfiguracja autoloaderów w nowych namespacach
     *
     * @return Zend_Loader_Autoloader
     */
    protected function _initAutoloader()
    {
        //die("autoloader");                
        
        require 'Zend/Loader/AutoloaderFactory.php';
        
        Zend_Loader_AutoloaderFactory::factory(array(
            'Zend_Loader_StandardAutoloader' => array(
                'namespaces' => array(
                    'Model' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'models',
                    'Table' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'Table',
                    'Row'   => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'Row'
                ))            
        ));
        
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->unregisterNamespace('ZendX_');        
       
        return $autoloader;
    }
    
    /**
     * Inicjalizacja i konfiguracja połączenia z bazą danych
     * 
     * @return Zend_Db_Table_Abstract 
     */
    protected function _initDb() {
        $dbAdapter = Zend_Db::factory(new Zend_Config($this->getOption('db')));
        
        Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
        Zend_Registry::set('db_adapter', $dbAdapter);

        $dbAdapter->setFetchMode(Zend_Db::FETCH_OBJ);

        return $dbAdapter;
    }

    /**
     * Inicjalizacja i konfiguracja uwierzytelniania użytkownika na bazie danych z tabeli bazy danych.
     *
     * @return Zend_Auth_Adapter_DbTable
     */
    protected function _initAuth()
    {
        $config = $this->getOption('auth');

        $authAdapter = new Zend_Auth_Adapter_DbTable(
            Zend_Registry::get('db_adapter'), $config['table']['name'], $config['table']['user_column'],
            $config['table']['pass_column'], $config['table']['pass_treatment']
        );

        Zend_Registry::set('auth_adapter', $authAdapter);

        return $authAdapter;
    }

    /**
     * Inicjalizacja mapera adresów na kontrolery
     *
     * @return Zend_Controller_Router_Interface
     */
    protected function _initRouter()
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');

        $routesConfig = new Zend_Config_Ini(CONFIGS_PATH . DIRECTORY_SEPARATOR . 'routes.ini', APPLICATION_ENV);

        $router = $front->getRouter();

        $router->addConfig($routesConfig);        
                
        return $router;
    }

    /**
     * Inicjalizacja i konfiguracja pomocnika widoku
     *
     * @return Zend_Controller_Action_Helper_ViewRenderer
     */
    protected function _initViewRenderer()
    {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')
            // podział widoków na moduły
            ->setViewScriptPathSpec(':module/:controller/:action.:suffix');

        return $viewRenderer;
    }

}