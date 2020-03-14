<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminDiscountController extends AdminBase {
    public function actionIndex() {
        
        self::checkAdmin();

        $discountList = array();
        $discountList = Product::getDiscountList();

        require_once(ROOT . "/views/admin_discount/index.php");
        return true;
    }  
    
    public function actionCreate() {
        self::checkAdmin();        

        $discountList = Product::getDiscountList();
        $name = "";
        $date_start = "";
        $date_end = "";
        $item_id = "";
        $item_type = "";
        $discount = "";
        $id = 0;

        if (isset($_POST["submit"])) {
            $options["name"] = $_POST["name"];
            $options["date_start"] = $_POST["date_start"];
            $options["date_end"] = $_POST["date_end"];
            $options["item_id"] = $_POST["item_id"];
            $options["item_type"] = $_POST["item_type"];
            $options["discount"] = $_POST["discount"];            

            $errors = false;
            if (!isset($options["date_start"]) || empty($options["date_start"]) || empty($options["date_end"]) || empty($options["item_type"]) || empty($options["discount"]) || empty($options["item_id"])) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $id = Product::addDiscount($options);
                header("Location: /admin/discount");                
            }

            if ($id) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . UPLOAD_IMAGE_PATH . "{$id}.jpg");
                }
            }                     
        }

        require_once(ROOT . "/views/admin_discount/create.php");
        return true;
    }
    
    /*public function actionDelete($id) {

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

        $categoryList = Category::getCategoriesList();
        $product = Product::getProductById($id);

        $result = false;
        

        if (isset($_POST["submit"])) {
            $options["id"] = $id;
            $options["name"] = $_POST["name"];
            $options["code"] = $_POST["code"];
            $options["price"] = $_POST["price"];
            $options["category_id"] = $_POST["category_id"];
            $options["brand"] = $_POST["brand"];
            $options["availability"] = $_POST["availability"];
            $options["description"] = $_POST["description"];
            $options["is_new"] = $_POST["is_new"];
            $options["is_recommended"] = $_POST["is_recommended"];            
            $options["status"] = $_POST["status"];

            $errors = false;
            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $product = Product::updateProductById($options);
                $result = true;
                // header("Location: /admin/product");
            }   
            
            if ($product) {
                print_r($_FILES);
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . UPLOAD_IMAGE_PATH . "{$id}.jpg");
                }
            }
        }

        require_once(ROOT . "/views/admin_product/update.php");
        return true;
    }*/    
}