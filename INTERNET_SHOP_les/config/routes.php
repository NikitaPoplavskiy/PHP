<?php
return array(
    //'news/([a-z]+)/([0-9]+)' => "news/view/$1/$2",
    //'news/([0-9]+)' => "news/view/$1",
        
    //'news' => 'news/index', // actionIndex в NewsController
    //'products' => 'products/list', // actionList в  ProductsController

    "product/([0-9]+)" => "product/view/$1",

    "" => "site/index", // indexList в siteConroller
);