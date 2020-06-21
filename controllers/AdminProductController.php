<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminProductController extends AdminBase
{
    public function actionIndex($page)
    {

        self::checkAdmin();

        $productList = array();
        $productList = Product::getProductsList($page);

        $total = Product::getTotalProducts();

        $pagination = new Pagination($total, $page, Order::SHOW_BY_DEFAULT, "page-");

        require_once(ROOT . "/views/admin_product/index.php");
        return true;
    }

    public function actionDelete($id)
    {

        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Product::deleteProductById($id);
            header("Location: /admin/product/page-1");
        }

        require_once(ROOT . "/views/admin_product/delete.php");
        return true;
    }

    public function actionUpdate($id)
    {
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
    }
    public function actionCreate()
    {
        self::checkAdmin();

        $categoryList = Category::getCategoriesList();
        $name = "";
        $code = "";
        $price = "";
        $brand = "";
        $description = "";
        $id = 0;

        if (isset($_POST["submit"])) {
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
            if (
                !isset($options["name"]) || empty($options["name"]) || !isset($options["code"]) || empty($options["code"])
                || !isset($options["price"]) || empty($options["price"])
                || !isset($options["category_id"]) || empty($options["category_id"])
                || !isset($options["brand"]) || empty($options["brand"])
                || !isset($options["availability"]) || empty($options["availability"])
                || !isset($options["description"]) || empty($options["description"])
                || !isset($options["is_new"]) || empty($options["is_new"])
                || !isset($options["is_recommended"]) || empty($options["is_recommended"])
                || !isset($options["status"]) || empty($options["status"])
            ) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $id = Product::addProduct($options);
                header("Location: /admin/product/page-1");
            }

            if ($id) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . UPLOAD_IMAGE_PATH . "{$id}.jpg");
                }
            }
        }

        require_once(ROOT . "/views/admin_product/create.php");
        return true;
    }
}
