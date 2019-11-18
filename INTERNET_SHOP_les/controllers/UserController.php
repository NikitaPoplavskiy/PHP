<?php

/*include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';*/

class UserController {
    public function actionRegister() {

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
        }

        $errors = false;

        if (!User::checkName($name)) {
            $errors[] = "Имя должно быть не короче 2-х символов";    
        } 
            
        if (!User::checkPassword($password)) {

            $errors[] = "Пароль должен быть не короче 6 символов";
        } 
        
        if (!User::checkEmail($email)) {            
            $errors[] = "неправильный Email";
        }                 

        if(User::checkEmailExists($email)) {
            $errors[] = "Такой Email уже существует";
        }    
            
        if ($errors == false) {        
            $result = User::register($name, $email, $password);
        }
        
        

        /**
         * Вывод данных,для проверки,на странице register.php
         */        
        /*if(isset($name)) {
            echo "<br>name: " . $name;
        }

        if(isset($email)) {
            echo "<br>email: " . $email;
        }

        if(isset($password)) {
            echo "<br>password: " . $password;
        }*/
        
        require_once(ROOT . "/views/user/register.php");

        return true;
    }
}