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
        $db = DB::getConnection();

        $newsList = array();

        $result = $db->query('select id, title, date, short_content from news order by date desc limit 10');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }
}
