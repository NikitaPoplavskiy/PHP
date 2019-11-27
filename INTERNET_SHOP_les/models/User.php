<?php

class User {

    public static function register($name, $email, $password) {        
        $db = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "insert into user (name, email, password) values (:name, :email, :password)";

        $result = $db->prepare($sql);
        //$password_hash = password_hash($password,PASSWORD_DEFAULT);

        $password_hash = md5($password);        

        // Заменяем placeHolder на значения
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password_hash, PDO::PARAM_STR);

        $test = $result->execute();
        if ($test == false) {
             //echo var_dump($result->errorInfo());
             return $result->errorInfo();
        }
        // echo "Darova: " . var_dump($test);

        return $test;  

    }

    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password) {
        if(strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {
        $db  = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "select count(*) from user where email = :email";
                 
        $result = $db->prepare($sql);

        // Заменяем placeHolder на значение введенного email
        $result->bindParam(":email", $email, PDO::PARAM_STR);

        // Извлекаем из БД
        $result->execute();

        // Проверка на наличие записей в БД (если есть - вернем true)
        if($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    public static function checkUserData($email,$password) {
        $db  = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "select * from user where email = :email and password = :password";
                 
        $result = $db->prepare($sql);

        // $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $password_hash = md5($password);        

        // Заменяем placeHolder на значение введенного email
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password_hash, PDO::PARAM_STR);

        // Извлекаем из БД
        $result->execute();

        $user = $result->fetch();
        // Проверка на наличие записей в БД (если есть - вернем true)
        if ($user) {
            return $user["id"];
        }
        return false;
    }

    public static function auth($userId) {        
        $_SESSION["user"] = $userId;
    }

    public static function checkLogged() {        
        if (isset($_SESSION["user"])) {
            return $_SESSION["user"];
        }
        header("Location: /user/login/");
    }

    public static function isGuest() {
        if (isset($_SESSION["user"])) {
            return false;
        }
        return true;
    }

    public static function getUserById($userId) {
        $db  = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "select * from user where id = :id";
                 
        $result = $db->prepare($sql);

        // Заменяем placeHolder на значение введенного email
        $result->bindParam(":id", $userId, PDO::PARAM_STR);        

        // Извлекаем из БД
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function edit($id, $name, $password) {
        $db = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $password = trim($password);

        $sql = "update user set name = :name, password = :password where id = :id";

        if (strlen($password) == 0) {
            $sql = "update user set name = :name where id = :id";        
        } else {
            $password = md5($password);
        }        

        $result = $db->prepare($sql);        


        // Заменяем placeHolder на значения
        $result->bindParam(":id", $id, PDO::PARAM_STR);        
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        if (strlen($password) > 0) {
            $result->bindParam(":password", $password, PDO::PARAM_STR);        
        }  

        return $result->execute();                
    }

}