<?php


class Category
{

    /**
     * Returns an array of categories
     */
    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $sql = "SELECT id,name FROM category ORDER BY sort_order ASC";

        $result = $db->prepare($sql);

        //$result->bindParam(":productId", $productId, PDO::PARAM_STR);

        $result->execute();
        //$result = $db->query("SELECT id,name FROM category ORDER BY sort_order ASC");
        
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        // echo var_dump($categoryList);

        return $categoryList;        
    }

}