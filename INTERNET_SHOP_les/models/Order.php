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

    public static function getOrders() {
        $db = DB::getConnection();

        $ordersList = array();
        // Подготовленный запрос со специальным placeHolder (:email). Нужен для безопасности.
        $sql = "select * from product_order";
        
        $result = $db->prepare($sql);        
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]["id"] = $row["id"];
            $ordersList[$i]["user_name"] = $row["user_name"];
            $ordersList[$i]["user_phone"] = $row["user_phone"];
            $ordersList[$i]["user_comment"] = $row["user_comment"];
            $ordersList[$i]["user_id"] = $row["user_id"];
            $ordersList[$i]["date"] = $row["date"];
            $ordersList[$i]["products"] = $row["products"];
            $ordersList[$i]["status"] = $row["status"];
            $i++;
        }
        return $ordersList;
    }

    public static function getOrder($id) { 
        $db = DB::getConnection();

        $sql = "select * from product_order where id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        // error_log("Продукт удален $id");
        $result->execute();

        $order = $result->fetch();
                
        return $order;
        
    }

    public static function getProductsByIds($idList) { 
        $db = DB::getConnection();

        $idsString = implode("," , $idList);

        $sql = "select * from product where id in ($idsString)";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        // error_log("Продукт удален $id");
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $products = $result->fetchAll();
                
        return $products;
    }

    public static function deleteOrderById($id) {
        $db = DB::getConnection();

        $sql = "delete from product_order where id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        // error_log("Продукт удален $id");
         $result->execute();
    }

    public static function updateOrderById($options) {
        $db = DB::getConnection();

        $sql = "update product_order set user_name = :name, user_phone = :phone, user_comment = :comment, user_id = :user_id, date = :date, status = :status where id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $options["id"], PDO::PARAM_STR);
        $result->bindParam(":name", $options["name"], PDO::PARAM_STR);
        $result->bindParam(":phone", $options["phone"], PDO::PARAM_STR);
        $result->bindParam(":comment", $options["comment"], PDO::PARAM_STR);
        $result->bindParam(":user_id", $options["user_id"], PDO::PARAM_STR);
        $result->bindParam(":date", $options["date"], PDO::PARAM_STR);
        $result->bindParam(":status", $options["status"], PDO::PARAM_STR);        
        
        /*if (!$result->execute()) {
            $error = $result->errorInfo();
        }*/
        
        // return Product::getProductById($options["id"]);

        return Order::getOrder($options["id"]);
    }
}