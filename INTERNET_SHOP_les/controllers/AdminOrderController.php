<?php

require_once(ROOT . "/models/AdminBase.php");

class AdminOrderController extends AdminBase {
    public function actionIndex() {
        
        self::checkAdmin();

        require_once(ROOT . "/views/admin/index.php");
        return true;
    }    
    
}