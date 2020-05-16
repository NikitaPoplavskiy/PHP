<?php

class CabinetController
{
    public function actionIndex()
    {


        $userId = User::checkLogged();

        // echo $userId;

        $user = User::getUserById($userId);



        require_once ROOT . "/views/cabinet/index.php";

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user["name"];
        $password = $user["password"];

        $result = false;

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Имя должно быть не короче 2-х символов";
            }

            if (!User::checkPassword($password)) {
                $errors[] = "Пароль должен быть не короче 6 символов";
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }
        // error_log($name);
        require_once ROOT . "/views/cabinet/edit.php";

        return $result;
    }

    public function actionRecipes()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user) {
            $recipes = User::getRecipes($userId);

            if (isset($_POST["submit"])) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    $recipeId = User::addRecipe($userId);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . UPLOAD_RECIPE_PATH . "{$recipeId}.jpg");
                }
            }
            require_once(ROOT . "/views/cabinet/recipes.php");
        } else {
            header("Location: /user/login/");
        }
        return true;
    }

    public function actionHistory($page = 1)
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $total = User::getTotalUsersOrders($userId);
        $pagination = new Pagination($total, $page, Order::SHOW_BY_DEFAULT, "page-");

        if ($user) {

            $userOrdersList = User::getUserOrders($userId, $page);            

            require_once(ROOT . "/views/cabinet/history.php");
        } else {
            header("Location: /user/login/");
        }
        return true;
    }

    public function actionView($id)
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user) {
            $order = Order::getOrder($id, $userId);

            $productsQuantity = json_decode($order["products"], true);

            $productsIds = array();
            $products = array();
            
            if (!is_null($productsQuantity)) {
                $productsIds = array_keys($productsQuantity);

                $products = Order::getProductsByIds($productsIds);

                foreach ($products as &$product) {
                    $product["quantity"] = $productsQuantity[$product["id"]];
                }
            }

            require_once(ROOT . "/views/cabinet/view.php");
        } else {
            header("Location: /user/login/");
        }
        return true;
    }
}
