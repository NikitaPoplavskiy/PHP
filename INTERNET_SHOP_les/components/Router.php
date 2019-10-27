<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }   
    
    /**
     * Returns request string
     * @return string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');            
        }
    }

    public function run() {


        //echo print_r($_SERVER);

        // ПОЛУЧИТЬ СТРОКУ ЗАПРОСА
        // echo $_SERVER['REQUEST_URI'];

        $uri = $this->getURI();
        // echo $uri;
        
        
        // ПРОВЕРИТЬ НАЛАЧИЕ ТАКОГО ЗАПРОСА В Routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPattern -> $path";

            if (preg_match("~$uriPattern~", $uri)) {

                // ПОЛУЧАЕМ ВНУТРЕННИЙ ПУТЬ ИЗ ВНЕШНЕГО СОГЛАСНО ПРАВИЛУ

                $internalRouter = preg_replace("~uriPattern~", $path, $uri);

                //ОПРЕДЕЛИТЬ КАКОЙ КОНТРОЛЛЕР И action ОБРАБАТЫВАЮТ ЗАПРОС
                $segment = explode('/', $path);
                
                //DAROVA
                echo '<pre>';
                print_r($segment);
                echo '</pre>';

                $controllerName = array_shift($segment) . 'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action' . ucfirst(array_shift($segment));
                echo '<br>Класс: ' . $controllerName;
                echo '<br>Метод: ' . $actionName;

                // ПОДКЛЮЧИТЬ ФАЙЛ КЛАССА-КОНТРОЛЛЕРА

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // СОЗДАТЬ ОБЪЕКТ, ВЫЗВАТЬ МЕТОД (Т.Е action )

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();

                if ($result != null) {
                    break;
                }
            }
        }
        
        
        

        


        //print_r($this->routes);
        //echo "Darova";
    }
    
}
