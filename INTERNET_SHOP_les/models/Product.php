<?php


class Product
{

    const SHOW_BY_DEFAULT = 4;

    /**
     * Returns an array of categories
     */    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $sql = "select id, name, price, is_new from product where status = 1 order by id desc limit " . $count;

        $result = $db->prepare($sql);

        //$result = $db->query("select id, name, price, is_new from product where status = 1 order by id desc limit " . $count);
        // echo var_dump($result);

        $result->execute();

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

    public static function getProductsList() { 
        $db = DB::getConnection();

        $productsList = array();

        $sql = "select id, code, name, price from product";

        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];            
            $i++;
        }
        return $productsList;
    }

    public static function deleteProductById($id) {
        $db = DB::getConnection();

        $sql = "delete from product where id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        // error_log("Продукт удален $id");
         $result->execute();
    }

    public static function updateProductById($id) {
        
    }

    public static function getRecomendedProducts() {

        $db = DB::getConnection();

        $productsList = array();

        $sql = "select id, name, price, is_recommended from product where is_recommended = 1";

        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            // $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_recommended'] = $row['is_recommended'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Returns an array of products for category
     */  
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {             
            $page  = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $sql = "select id, name, price, is_new from product where status = 1 and category_id = :categoryId order by id asc limit " . self::SHOW_BY_DEFAULT . " offset $offset";
            $result = $db->prepare($sql);
            $result->bindParam(":categoryId", $categoryId, PDO::PARAM_STR);
            $result->execute();

            //$result = $db->query("select id, name, price, is_new from product where status = 1 and category_id = '$categoryId' order by id asc limit"
             //. self::SHOW_BY_DEFAULT . " offset $offset");
            // echo var_dump($result);

            $products = array();
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

    /**
     * Returns single product by id
     */
    public static function getProduct($productId) {

        if ($productId) {                                        
            $db = Db::getConnection();            


            $sql = "select id, name, price, is_new, availability, brand, code from product where status = 1 and id = :productId";

            $result = $db->prepare($sql);

            $result->bindParam(":productId", $productId, PDO::PARAM_STR);

            $result->execute();
            //$result = $db->query("select id, name, price, is_new, availability, brand, code from product where status = 1 and id = '$productId'");
            // echo var_dump($result);            
            $product = $result->fetch();

            //echo var_dump($product);
            

            return $product;
        }    
    }

    /**
     * Returns count of a products in category
     */
    public static function getTotalProductsInCategory($categoryId) {
        $db = Db::getConnection();            

        $sql = "select count(id) as count from product where status = 1 and category_id = :categoryId";

        $result = $db->prepare($sql);

        $result->bindParam(":categoryId", $categoryId, PDO::PARAM_STR);

        $result->execute();

        //$result = $db->query("select count(id) as count from product where status = 1 and category_id = '$categoryId'");
        // echo var_dump($result);            
        //$result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();        

        //echo var_dump($row);

        return $row["count"];
    }

    public static function getProductsIds($idsArray) {
        $products = array();

        $db = DB::getConnection();

        $idString = implode(',', $idsArray);

        $sql = "select * from product where status = '1' and id in ($idString)";

        //$result->bindParam(":idString", $idString, PDO::PARAM_STR);

        $result = $db->query($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];            
            $products[$i]['code'] = $row['code'];
            $i++;
        }
        return $products;
    }
}