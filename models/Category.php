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

        $sql = "SELECT id,name FROM category where status > 0 ORDER BY sort_order ASC";

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


    public static function getAdminCategoryList()
    {
        $db = DB::getConnection();

        $categoryList = array();

        $sql = "SELECT id,name,sort_order,status FROM category ORDER BY sort_order ASC";

        $result = $db->prepare($sql);

        //$result->bindParam(":productId", $productId, PDO::PARAM_STR);

        $result->execute();
        //$result = $db->query("SELECT id,name FROM category ORDER BY sort_order ASC");

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        // echo var_dump($categoryList);

        return $categoryList;
    }

    public static function addCategory($options)
    {
        $db = DB::getConnection();

        $sql = "insert into category (name,sort_order,status) values (:name,:sort_order,:status)";

        $result = $db->prepare($sql);

        $result->bindParam(":name", $options["name"], PDO::PARAM_STR);
        $result->bindParam(":sort_order", $options["sort_order"], PDO::PARAM_STR);
        $result->bindParam(":status", $options["status"], PDO::PARAM_STR);

        if ($result->execute()) {
            return $db->lastInsertId();
        }

        return 0;
    }

    public static function updateCategory($options)
    {
        $db = DB::getConnection();

        $sql = "update category set name = :name, sort_order = :sort_order, status = :status where id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(":id", $options["id"], PDO::PARAM_STR);
        $result->bindParam(":name", $options["name"], PDO::PARAM_STR);
        $result->bindParam(":sort_order", $options["sort_order"], PDO::PARAM_STR);
        $result->bindParam(":status", $options["status"], PDO::PARAM_STR);

        if ($result->execute()) {
            return Category::getCategoryById($options["id"]);
        }

        return 0;
    }

    public static function deleteCategoryById($categoryId)
    {
        $db = DB::getConnection();

        $sql = "delete from category where id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $categoryId, PDO::PARAM_STR);
        // error_log("Продукт удален $id");
        $result->execute();
    }

    public static function getCategoryById($categoryId)
    {
        if ($categoryId) {
            $db = Db::getConnection();

            $sql = "select * from category where id = :categoryId";

            $result = $db->prepare($sql);

            $result->bindParam(":categoryId", $categoryId, PDO::PARAM_STR);

            $result->execute();

            $category = $result->fetch();

            return $category;
        }
    }
}
