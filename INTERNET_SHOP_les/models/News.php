<?php


class News {

    /**
     * Returns single news item with specified id
     * @param integer $id
     */
    public static function getNewsById($id) {
        //Запрос к БД
        $id = intval($id);

        $db = DB::getConnection();

        $result = $db->query('select * from news where id= ' .  $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();

        return $newsItem;
    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList() {
        //Запрос к БД
    }
}
