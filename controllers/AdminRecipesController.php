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

        self::checkAdmin();        

        $foundRecipes = array();                

        if (isset($_POST["search"])) {            
            $searchString = $_POST["search"];           
            $total = User::getTotalRecipesOfUser($searchString);
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, "page-");

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
            $foundRecipes = Product::searchAdmin($searchString, $page, $sql);
        }
        
        require_once(ROOT . "/views/admin_recipes/search_admin.php");
        return true;
    }
   
}