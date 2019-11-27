<?php

/*include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';*/

class SiteController {
    public function actionIndex() {
                
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);
         


        require_once(ROOT . "/views/site/index.php");

        return true;
    }

    public function actionContacts() {        
        $email = '';
        $message = '';
        
        $result = false;
        $isSend = false;

        if (isset($_POST["submit"])) {            
            $email = $_POST["email"];            
            $message = trim($_POST["message"]);   
        

            $errors = false;                          
            
            if (!User::checkEmail($email)) {            
                $errors[] = "неправильный Email";
            }   
                    
            if (empty($message)){
                $errors[] = "Сообщение не должно быть пустым";
            } 
                
            if ($errors == false) {              
                // $result = User::register($name, $email, $password);
                $isSend = true;
            }           
        }
        require_once(ROOT . "/views/site/contacts.php");

        return true;
    
    }
}