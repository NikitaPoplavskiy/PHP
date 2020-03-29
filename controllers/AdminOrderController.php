<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminOrderController extends AdminBase {
    
    public function actionIndex($page) {
        self::checkAdmin();

        $ordersList = Order::getOrders($page);

        $total = Order::getTotalOrders();

        $pagination = new Pagination($total, $page, Order::SHOW_BY_DEFAULT, "page-");

        require_once(ROOT . "/views/admin_order/index.php");
        return true;
    }    

    public function actionDelete($id) {
        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Order::deleteOrderById($id);
            header("Location: /admin/order");
        }

        require_once(ROOT . "/views/admin_order/delete.php");
        return true;
    }

    public function actionUpdate($id) { 
        self::checkAdmin();

        $order = Order::getOrder($id);

        if (isset($_POST["submit"])) {        
            $options["id"] = $id; 
            $options["name"] = $_POST["name"];
            $options["phone"] = $_POST["phone"];
            $options["comment"] = $_POST["comment"];
            $options["user_id"] = $_POST["user_id"];
            $options["status"] = $_POST["status"];
            $options["date"] = $_POST["date"];           

            $errors = false;
            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $order = Order::updateOrderById($options);                
                header("Location: /admin/order/page-1");
            }                        
            // header("Location: /admin/order");
        }

        require_once(ROOT . "/views/admin_order/update.php");
        return true;
    }

    public function actionView($id) {     
        self::checkAdmin();

        $order = Order::getOrder($id);

        $productsQuantity = json_decode($order["products"],true);

        $productsIds = array_keys($productsQuantity);
        
        $products = Order::getProductsByIds($productsIds);

        foreach ($products as &$product) {
            $product["quantity"] = $productsQuantity[$product["id"]];
        }

        require_once(ROOT . "/views/admin_order/view.php");
        return true;
    }
    
    public static function orderStatusToString($status) { 
        $stringStatus = "";
        switch($status) {
            case 1 :{ 
                $stringStatus = "Новый заказ";                
                break;
            }
            case 2: {
                $stringStatus = "В обрабоке";
                break;
            }
            case 3 : {
                $stringStatus = "Обработан";
                break;
            }
            default: $stringStatus = "unknown";
        }
        return $stringStatus;
    }

    public static function orderStatusToNum($status) { 
        if ($status == "Новый заказ") {
            return 1;
        }
        elseif ($status == "В обработке") {
            return 2;
        }
        elseif ($status == "Обработан") {
            return 3;
        }
    }

}