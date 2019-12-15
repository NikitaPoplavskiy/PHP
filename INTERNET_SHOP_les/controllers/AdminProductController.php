<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminProductController extends AdminBase {
    public function actionIndex() {
        
        self::checkAdmin();

        $productList = array();
        $productList = Product::getProductsList();

        require_once(ROOT . "/views/admin_product/index.php");
        return true;
    }    
    
    public function actionDelete($id) {

        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }

        require_once(ROOT . "/views/admin_product/delete.php");
        return true;
    }

    public function actionUpdate($id) { 
        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Product::updateProductById($id);
            header("Location: /admin/product");
        }

        require_once(ROOT . "/views/admin_product/update.php");
        return true;
    }
}