<?php

    spl_autoload_register(function($class_name) {

    // Массив, в котором хранятся названия папок, в которых находятся классы
    $array_path = array("/models/","/components/","/db/");

    foreach ($array_path as $path) {
        // Формируем путь к нужному классу    
        $path = ROOT . $path . $class_name . ".php";
        
        // is_file - определяет, является ли файл обычным файлом
        if (is_file($path)) {
            // Подключение нужного класса
            include_once $path;
        }
    }
});
