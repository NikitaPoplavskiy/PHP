<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminDiscountController extends AdminBase
{
    public function actionIndex()
    {

        self::checkAdmin();

        $discountList = array();
        $discountList = Product::getDiscountList();

        require_once(ROOT . "/views/admin_discount/index.php");
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $discountList = Product::getDiscountList();
        $name = "";
        $date_start = "";
        $date_end = "";
        $item_id = "";
        $item_type = "";
        $discount_ = "";
        $id = 0;

        if (isset($_POST["submit"])) {
            $options["name"] = $_POST["name"];
            $options["date_start"] =  date('Y-m-d H:i:s', strtotime($_POST["date_start"]));
            $options["date_end"] = date('Y-m-d H:i:s', strtotime($_POST["date_end"]));
            $options["item_id"] = $_POST["item_id"];
            $options["item_type"] = $_POST["item_type"];
            $options["discount"] = $_POST["discount"];

            $errors = false;
            if (!isset($options["date_start"]) || empty($options["date_start"]) || empty($options["date_end"]) || empty($options["item_type"]) || empty($options["discount"]) || empty($options["item_id"])) {
                $errors[] = "Заполните все поля";
                $name =  $options["name"];
                $date_start = $options["date_start"];
                $date_end = $options["date_end"];
                $item_id = $options["item_id"];
                $item_type = $options["item_type"];
                $discount_ = $options["discount"];
            }

            foreach ($discountList as $discount) {
                if ($discount["item_id"] == $options["item_id"] && $discount["item_type"] == $options["item_type"] && $discount["date_end"] >= $options["date_start"] && $discount["date_start"] <= $options["date_start"]) {
                    $errors[] = "На данный элемент уже действует скидка в заданном промежутке!";
                    $name =  $options["name"];
                    $date_start = $options["date_start"];
                    $date_end = $options["date_end"];
                    $item_id = $options["item_id"];
                    $item_type = $options["item_type"];
                    $discount = $options["discount"];
                }
            }

            if ($errors == false) {
                Product::addDiscount($options);
                header("Location: /admin/discount");
            }
        }

        require_once(ROOT . "/views/admin_discount/create.php");
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Product::deleteDiscountById($id);
            header("Location: /admin/discount");
        }

        require_once(ROOT . "/views/admin_discount/delete.php");
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $discountList = Product::getDiscountList();
        $discount = Product::getDiscountById($id);

        $name =  $discount["name"];
        $date_start = $discount["date_start"];
        $date_end = $discount["date_end"];
        $item_id = $discount["item_id"];
        $item_type = $discount["item_type"];
        $discount_ = $discount["discount"];

        $result = false;

        if (isset($_POST["submit"])) {
            $options["id"] = $id;
            $options["name"] = $_POST["name"];
            $options["date_start"] = date('Y-m-d H:i:s', strtotime($_POST["date_start"]));
            $options["date_end"] = date('Y-m-d H:i:s', strtotime($_POST["date_end"]));
            $options["item_id"] = $_POST["item_id"];
            $options["item_type"] = $_POST["item_type"];
            $options["discount"] = $_POST["discount"];

            /*$errors = false;
            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $product = Product::updateProductById($options);
                $result = true;
                // header("Location: /admin/product");
            }*/

            $errors = false;
            if (!isset($options["date_start"]) || empty($options["date_start"]) || empty($options["date_end"]) || empty($options["item_type"]) || empty($options["discount"]) || empty($options["item_id"])) {
                $errors[] = "Заполните все поля";
            }

            foreach ($discountList as $discount) {
                if ($discount["item_id"] == $options["item_id"] && $discount["item_type"] == $options["item_type"] && $discount["date_end"] >= $options["date_start"] && $discount["date_start"] <= $options["date_start"]) {
                    $errors[] = "На данный элемент уже действует скидка в заданном промежутке!";
                }
            }

            if ($errors == false) {
                Product::updateDiscount($options);
                $name =  $options["name"];
                $date_start = $options["date_start"];
                $date_end = $options["date_end"];
                $item_id = $options["item_id"];
                $item_type = $options["item_type"];
                $discount_ = $options["discount"];

                $result = true;
            }
        }

        require_once(ROOT . "/views/admin_discount/update.php");
        return true;
    }
}
