<?php


require_once(ROOT . "/models/AdminBase.php");

class AdminCategoryController extends AdminBase
{
    public function actionIndex() {        
        self::checkAdmin();

        $categoryList = Category::getAdminCategoryList();

        require_once(ROOT . "/views/admin_category/index.php");
        return true;
    }    

    public function actionCreate() {
        self::checkAdmin();

        $name = "";
        $sort_order = 0;
        $status = 0;
        $errors = false;

        if (isset($_POST["submit"])){
            $options["name"] = $_POST["name"];
            $options["sort_order"] = $_POST["sort_order"];
            $options["status"] = $_POST["status"];

            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните название категории";
            }

            if ($errors == false) {
                $categoryId = Category::addCategory($options);
                header("Location:/admin/category");
            }
        }
        
        require_once(ROOT . "/views/admin_category/create.php");
        return true;
    }

    public function actionUpdate($categoryId) {
        self::checkAdmin();

        $errors = false;

        $category = Category::getCategoryById($categoryId);

        if (isset($_POST["submit"])){
            $options["id"] = $categoryId;
            $options["name"] = $_POST["name"];
            $options["sort_order"] = $_POST["sort_order"];
            $options["status"] = $_POST["status"];

            if (!isset($options["name"]) || empty($options["name"])) {
                $errors[] = "Заполните название категории";
            }

            if (!isset($options["sort_order"]) || empty($options["sort_order"])) {
                $errors[] = "Укажите порядок отображение её в списке категорий!";
            }

            if ($errors == false) {
                $category = Category::updateCategory($options);
                header("Location:/admin/category");
            }
        }
        
        require_once(ROOT . "/views/admin_category/update.php");
        return true;
    }

    public function actionDelete($categoryId) {
        self::checkAdmin();

        if (isset($_POST["submit"])) {
            Category::deleteCategoryById($categoryId);
            header("Location: /admin/category");
        }

        require_once(ROOT . "/views/admin_category/delete.php");
        return true;
    }

}