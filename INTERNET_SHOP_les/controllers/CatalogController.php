<?php

/*include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';*/

class CatalogController {
    public function actionIndex() {
                
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);


        require_once(ROOT . "/views/catalog/index.php");

        return true;
    }
    
    public function actionCategory($categoryId, $page = 1) {
        // echo "Категория: " . $page;
        
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, "page-");

        if(isset($_POST["price"])) {
            $_SESSION["price"] = $_POST["price"];
            // echo $_SESSION["price"];
        }
        switch($_SESSION["price"]) {
            case "priceasc": 
                $_SESSION["price"] = "price ASC";
                // echo $_SESSION["price"];
                $sort_name = "По увеличению цены";
                
                $top = $_SESSION["price"];
            
                $latestProducts = Product::Sorting($top,$page,$categoryId);   
            break;
            case "pricedesc": 
                $_SESSION["price"] = "price DESC";
                // echo $_SESSION["price"];
                $sort_name = "По уменьшению цены";
                
                $top = $_SESSION["price"];
            
                $latestProducts = Product::Sorting($top,$page,$categoryId);   
            break;
            case "alpha": 
                $_SESSION["price"] = "name";
                // echo $_SESSION["price"];
                $sort_name = "По алфавиту";
                
                $top = $_SESSION["price"];
            
                $latestProducts = Product::Sorting($top,$page,$categoryId);   
            break;            
                
        }               

        require_once(ROOT . "/views/catalog/category.php");

        return true;
}
 
          }

          // $latestProducts = Category::sortByCheepToExp($options);


           