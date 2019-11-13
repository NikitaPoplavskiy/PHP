<?php


class Product
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of categories
     */    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query("select id, name, price, is_new from product where status = 1 order by id desc limit " . $count);
        // echo var_dump($result);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            // $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        // echo var_dump($categoryList);

        return $productsList; 
    }

    /**
     * Returns an array of products for category
     */  
    public static function getProductsListByCategory($categoryId = false)
    {
        if ($categoryId) {                                        
            $db = Db::getConnection();

            $products = array();

            $result = $db->query("select id, name, price, is_new from product where status = 1 and category_id = '$categoryId' order by id desc limit " . self::SHOW_BY_DEFAULT);
            // echo var_dump($result);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                // $productsList[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            // echo var_dump($categoryList);

            return $products;
        } 
    }

}