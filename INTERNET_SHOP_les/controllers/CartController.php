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

    public function actionIndex() {

        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . "views/cart/index.php");
    }
}