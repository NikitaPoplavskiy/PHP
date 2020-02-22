<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminRecipesController extends AdminBase {
    public function actionIndex($page = 1) {
        
        self::checkAdmin();

        if(isset($_POST["recipe_id"]) && isset($_POST["status"])) {
            User::updateRecipeStatus($_POST["recipe_id"],$_POST["status"]);
        }

        $recipesList = array();
        $options = array();
        $total = User::getTotalRecipes();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, "page-");

        /*$session_price = "priceasc";
        $sort_op = "price ASC";*/        

        $recipesList = User::getRecipesList($options, $page);
        

        require_once(ROOT . "/views/admin_recipes/index.php");
        return true;
    }    

    public function actionSearch($page = 1) {       

        $foundRecipes = array();

        $total = User::getTotalRecipes();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, "page-");

        if (isset($_POST["search"])) {            
            $searchString = $_POST["search"];

            if($_POST['select']=='email') {
                $sql = "SELECT ur.*, us.name user_name, us.email user_email
                FROM user_recipes AS ur
                LEFT JOIN user AS us on us.id = ur.user_id
                where us.email like :search
                order by date_created desc
                limit :limit offset :offset";
              }              
              else{
                $sql = "SELECT ur.*, us.name user_name, us.email user_email
                FROM user_recipes AS ur
                LEFT JOIN user AS us on us.id = ur.user_id
                where us.name like :search
                order by date_created desc
                limit :limit offset :offset";
              }

            $foundRecipes = Product::searchAdmin($searchString,$page,$sql);
        }
        
        require_once(ROOT . "/views/admin_recipes/search_admin.php");
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
    public function actionCreate() {
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
            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните все поля";
            }

            if ($errors == false) {
                $id = Product::addProduct($options);
                header("Location: /admin/product");                
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