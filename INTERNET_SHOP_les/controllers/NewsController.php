<?php
include_once ROOT . "/models/News.php";


class NewsController {
    public function actionIndex() {
        //echo "Список новостей";
        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT . "/views/news/index.html");
        //echo "<br>News List: " . print_r($newsList);        

        return true;
    }

    public function actionView($id) {
        //echo "Просмотр одной новости";        
        //echo "<br>Category: " . $category ;
        //echo "<br>id: " . $id;

        if ($id) {
            $newsItem = News::getNewsById($id);

            echo "<pre>" . print_r($newsItem) . "</pre>" . "actionView";
        }
        return true;
    }
}