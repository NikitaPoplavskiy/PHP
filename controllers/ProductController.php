<?php


// include_once ROOT . "/models/Product.php";


class ProductController
{

    public function actionView($id) {
        // echo "ProductController_actionView: " . $id ;
        
        $product = Product::getProduct($id);        
	
        $categories = array();
        $categories = Category::getCategoriesList();

        $recomendedProducts = array();
        // $recomendedProducts = Product::getRecomendedProducts();
        $recomendedProducts = Product::getRecommendedProductByCategory($id);

        $discounts = Product::getProductsWithDiscounts($page = 1);

        require_once(ROOT . "/views/product/view.php");
        return true;        
    }
}