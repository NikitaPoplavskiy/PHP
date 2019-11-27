<?php

class CabinetController {
    public function actionIndex() {


        $userId = User::checkLogged();
        
        // echo $userId;

        $user = User::getUserById($userId);



        require_once ROOT . "/views/cabinet/index.php";
        
        return true;
    }

    public function actionEdit() {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);        

        $name = $user["name"];        
        $password = $user["password"];
        
        $result = false;

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];            
            $password = $_POST["password"];
                    
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Имя должно быть не короче 2-х символов";    
            } 
                
            if (!User::checkPassword($password)) {
                $errors[] = "Пароль должен быть не короче 6 символов";
            }                                  
                
            if ($errors == false) {              
                $result = User::edit($userId, $name, $password);                                                          
            }
        }
        // error_log($name);
        require_once ROOT . "/views/cabinet/edit.php";

        return $result;       
    }
}