<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminStatController extends AdminBase {
    public function actionIndex() {
        
        self::checkAdmin();

        require_once(ROOT . "/views/admin_stat/index.php");
        return true;
    }    
    
}