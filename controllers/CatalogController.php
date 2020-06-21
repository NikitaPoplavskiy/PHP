<?php

/*include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';*/


class CatalogController
{
    /*public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);


        require_once(ROOT . "/views/catalog/index.php");

        return true;
    }*/

    public function actionCategory($categoryId, $page = 1)
    {
        // echo "Категория: " . $page;

        $categories = array();
        $categories = Category::getCategoriesList();    
        
        $latestProducts = array();

        $session_price = "priceasc";
        $sort_op = "price ASC";

        if (isset($_POST["price"])) {
            $_SESSION["price"] = $_POST["price"];

            $session_price = $_SESSION["price"];
        }

        switch ($session_price) {
            case "priceasc":
                $sort_op = "price ASC";
                break;
            case "pricedesc":
                $sort_op = "price DESC";
                break;
            case "alpha":
                $sort_op = "name";
                break;
            default:
                $sort_op = "price ASC";
        }

        $latestProducts = Product::getProductsListByCategory($sort_op, $categoryId, $page);
        
        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, "page-");        

        // $latestProducts = Product::Sorting($sort_op, $page, $categoryId);

        require_once(ROOT . "/views/catalog/category.php");

        return true;
    }
}
