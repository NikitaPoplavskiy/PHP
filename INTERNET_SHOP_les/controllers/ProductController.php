<?php


include_once ROOT . "/models/Product.php";

class ProductController {

    public function actionView($id) {
        // echo "ProductController_actionView: " . $id ;
        
        $product = Product::getProduct($id);

        require_once(ROOT . "/views/product/view.php");
        return true;        
    }
}