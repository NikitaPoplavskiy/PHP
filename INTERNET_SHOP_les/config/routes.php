<?php
return array(
    'news/([a-z]+)/([0-9]+)' => "news/view/$1/$2",
    
    'news' => 'news/index', // actionIndex в NewsController
    'products' => 'products/list', // actionList в  ProductsController
);