<?php


class Cart {

    static function addProduct($id) {

        $id = intval($id);

        $productsInCart = array();

        // Если корзина уже существуе
        if (isset($_SESSION["products"])) {
            // То заполняем им наш массив
            $productsInCart = $_SESSION["products"];
        }

        //  Проверяем существование товара с переданным id в корзине
        if (array_key_exists($id, $productsInCart)) {
            // Если сть, то увеличиваем количество 
            $productsInCart[$id]++; 
        } else {
            // Если нет, то создаем ключ и присваиваем начальное значение
            $productsInCart[$id] = 1;
        }

        $_SESSION["products"] = $productsInCart;

        // error_log(var_dump($_SESSION["products"]));

        return $productsInCart[$id];
    }

    static function deleteFromCart($id) { 
        $id = intval($id);

        $productsInCart = array();
        unset($_SESSION["products"][$id]);                
        
        return $_SESSION["products"];
    }

    static function countDec($id) { 
        $id = intval($id);

        $productsInCart = array();
        
        if (isset($_SESSION["products"])) {
            // То заполняем им наш массив
            $productsInCart = $_SESSION["products"];
        }

        if (array_key_exists($id, $productsInCart)) {
            // Если есть, то уменьшаем количество 
            if ($productsInCart[$id] > 1) {
                $productsInCart[$id]--;
            }                       
        }
        $_SESSION["products"] = $productsInCart;

        return $productsInCart[$id];
    }

    static function countInc($id) {
        $id = intval($id);

        $productsInCart = array();

        if (isset($_SESSION["products"])) {
            // То заполняем им наш массив
            $productsInCart = $_SESSION["products"];
        }

        if (array_key_exists($id, $productsInCart)) {
            // Если есть, то уменьшаем количество
            $productsInCart[$id]++;
        }
        $_SESSION["products"] = $productsInCart;

        return $productsInCart[$id];
    }

    static function countItems() {
        if(isset($_SESSION["products"])) {
            $count = 0;
            foreach ($_SESSION["products"] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    static function getProducts() {
        if (isset($_SESSION["products"])) {
            return $_SESSION["products"];
        }
        return false;
    }

    static function clear() {
        unset($_SESSION["products"]);
    }

    static function getTotalPrice($products) {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($products) {            
            foreach ($products as $item) {
                $total += $item["price"] * $productsInCart[$item["id"]];
            }
        }

        return $total;
    }
    
}