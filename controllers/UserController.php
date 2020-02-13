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
            if (is_array($result)) {
                // echo var_dump($result);
                $errors[] = $result[2];
                $result = false;
                // echo var_dump($errors);
            }            
        }
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

    public function actionLogin() {

        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST["submit"])) {            
            $email = $_POST["email"];
            $password = $_POST["password"];
        

        $errors = false;        
            
        if (!User::checkPassword($password)) {

            $errors[] = "Пароль должен быть не короче 6 символов";
        } 
        
        if (!User::checkEmail($email)) {            
            $errors[] = "неправильный Email";
        }                 

        $userId = User::checkUserData($email,$password);
        
        if ($userId == false) {
            $errors[] = "Неверный email или пароль";
        } else {
            User::auth($userId);

            header("Location: /cabinet/");
        }
            
        if ($errors == false) {              
            $result = User::register($name, $email, $password);            
            if (is_array($result)) {
                // echo var_dump($result);
                $errors[] = $result[2];
                $result = false;
                // echo var_dump($errors);
            }            
        }
    }
        require_once(ROOT . "/views/user/login.php");
    }
    
    public function actionLogout() {
        // session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }

    public function actionRecipes() {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);  

        if ($user) {
            $recipes = User::getRecipes($userId);

            if (isset($_POST["submit"])) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    $recipeId = User::addRecipe($userId);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . UPLOAD_RECIPE_PATH . "{$recipeId}.jpg");
                }
            }
            require_once(ROOT . "/views/user/recipes.php");
        }
        else {
            header("Location: /user/login/");
        }
                
    }
        
}