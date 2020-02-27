<?php

class CartController {

    public function actionAdd($id) {
        
        //Добавляем товар в корзину 
        Cart::addProduct($id);
        error_log("CART:" . print_r($_SESSION["products"]));

        error_log("CartConroller -> actionAdd: $id");
        //Возвращаем пользователя на страницу
        $referrer = $_SERVER["HTTP_REFERER"];
        header("Location:  $referrer");        

        return true;
    }        

    public function actionAddAjax($id) {
        echo Cart::addProduct($id);        
        return true;
    }

    public function actionProductRemove($id) {
        echo Cart::countDec($id);
        return true;
    }

    public function actionDeleteAjax($id) {
        $productsInCart = Cart::deleteFromCart($id);

        $basket = array();

        $productsIds = array_keys($productsInCart);
        $basket["products"] = Product::getProductsByIds($productsIds);

        $basket["totalPrice"] = Cart::getTotalPrice($basket["products"]);

        echo json_encode($basket);
        // echo Cart::deleteFromCart($id);
        return true;
    }

    public function actionProductAdd($id) {
        // echo json_encode(Cart::countInc($id)); 
        echo Cart::countInc($id);
        return true;
    }

    public function actionIndex() {
        $valuta = " грн";
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }                
        require_once(ROOT . "/views/cart/index.php");
    }

    public function actionCheckout() {

        $result = false;        

        if (isset($_POST["submit"])) {

            $userName = $_POST["name"];
            $userPhone = $_POST["phone"];
            $userComment = $_POST["comment"];
            $result = false;

            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = "Имя введено некорректно";
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = "Номер телефона введен некорректно";
            }

            $productsInCart = Cart::getProducts();
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
            $totalQuantity = Cart::countItems();
            
            if (User::isGuest()) {
                $userId = false;
            } else {
                $userId = User::checkLogged();
            }
            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

            }

            if ($result) {
                $adminEmail = "nik.s.poplavsky@gmail.com";
                $message = "Заказ";
                $subject = "Новый заказ";
                // mail($adminEmail,$subject,$message);

                Cart::clear();                
            }

        } else {

            $productsInCart = Cart::getProducts();

            if ($productsInCart == false) {                
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (User::isGuest()) {

                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    $userName = $user["name"];
                }
            }
        }
        require_once(ROOT . "/views/cart/checkout.php");
        return true;
    }
}