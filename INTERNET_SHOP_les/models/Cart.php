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

        error_log(var_dump($_SESSION["products"]));
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

    static function getTotalPrice() {
        $productsInCart = self::getProducts();

        if ($productsInCart) {
            $total = 0;
            foreach ($products as $item) {
                $total += $item["price"] * $productsInCart[$item["id"]];
            }
        }
        return total;
    }
    
}