<?php

class User {

    public static function register($name, $email, $password) {
        
        $db = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "insert into user (name, email, password) values (:name, :email, :password)";

        $result = $db->prepare($sql);

        // Заменяем placeHolder на значения
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);

        return $result->execute();

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
     
}