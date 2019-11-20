<?php

    //FRONT CONROLLER

    //ОБЩИЕ НАСТРОЙКИ

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    session_start();

    //ПОДКЛЮЧЕНИЕ ФАЙЛОВ СИСТЕМЫ

    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Autoload.php');
    /*require_once(ROOT.'/components/Router.php');
    require_once(ROOT.'/db/db.php');*/


    //УСТАНОВКА ПОДКЛЮЧЕНИЯ К БД

    //ВЫЗОВ Router

    $router = new Router();
    $router->run();

    