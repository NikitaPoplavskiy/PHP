<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminOrderController extends AdminBase {
    public function actionIndex() {
        self::checkAdmin();

        $ordersList = Order::getOrders();        

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

}