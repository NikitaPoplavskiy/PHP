<?php

class Order {

    public static function save($userName, $userPhone, $userComment, $userId, $productsInCart) {        
        $db = DB::getConnection();

        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "insert into product_order (user_name, user_phone, user_comment, user_id, products) values (:name, :phone, :comment, :userId, :products)";

        $productsInCart = json_encode($productsInCart);
        $result = $db->prepare($sql);        
        

        // Заменяем placeHolder на значения
        $result->bindParam(":name", $userName, PDO::PARAM_STR);
        $result->bindParam(":phone", $userPhone, PDO::PARAM_STR);
        $result->bindParam(":comment", $userComment, PDO::PARAM_STR);
        $result->bindParam(":userId", $userId, PDO::PARAM_STR);
        $result->bindParam(":products", $productsInCart, PDO::PARAM_STR);

        $test = $result->execute();
        if ($test == false) {
             //echo var_dump($result->errorInfo());
             return $result->errorInfo();
        }
        // echo "Darova: " . var_dump($test);

        return $test;  

    }
}