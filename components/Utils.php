<?php

class Utils
{
    public static function formatDate($dateTime) {
        return date('Y-m-d', strtotime($dateTime));
    }


}
