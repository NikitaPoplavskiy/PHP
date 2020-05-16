<?php
return array(
    //'news/([a-z]+)/([0-9]+)' => "news/view/$1/$2",
    //'news/([0-9]+)' => "news/view/$1",
        
    //'news' => 'news/index', // actionIndex в NewsController
    //'products' => 'products/list', // actionList в  ProductsController

    "product/([0-9]+)" => "product/view/$1",
    "catalog/?$" => "catalog/index",
    "category/([0-9]+)/page-([0-9]+)" => "catalog/category/$1/$2",
    "category/([0-9]+)" => "catalog/category/$1",
    "user/register/?$" => "user/register",
    "user/login/?$" => "user/login",
    "user/logout/?$" => "user/logout",
    "cabinet/edit/?$" => "cabinet/edit",
    "cabinet/history/page-([0-9]+)/?$" => "cabinet/history/$1",
    "cabinet/order/view/([0-9]+)" => "cabinet/view/$1",
    "cabinet/?$" => "cabinet/index",      
    "contacts/?$" => "site/contacts",
    "about/?$" => "site/about",
    "search/?$" => "site/search",

    "cart/?$" => "cart/index",
    "cart/add/([0-9]+)$" => "cart/add/$1",
    "cart/addAjax/([0-9]+)$" => "cart/addAjax/$1",    
    "cart/productRemove/([0-9]+)$" => "cart/productRemove/$1",
    "cart/productAdd/([0-9]+)$" => "cart/productAdd/$1",  
    "cart/deleteAjax/([0-9]+)$" => "cart/deleteAjax/$1",
    "cabinet/recipes$" => "cabinet/recipes",
    "cart/checkout$" => "cart/checkout",
    
    "discounts/page-([0-9]+)" => "site/discounts/$1",

    // Управление товарами    
    "admin/product/create" => "adminProduct/create",
    "admin/product/update/([0-9]+)" => "adminProduct/update/$1",
    "admin/product/delete/([0-9]+)" => "adminProduct/delete/$1",
    "admin/product/page-([0-9]+)" => "adminProduct/index/$1",

    // Управление категориями        
    "admin/category/create" => "adminCategory/create",
    "admin/category/update/([0-9]+)" => "adminCategory/update/$1",
    "admin/category/delete/([0-9]+)" => "adminCategory/delete/$1",
    "admin/category" => "adminCategory/index",

    // Управление заказами    
    "admin/order/view/([0-9]+)" => "adminOrder/view/$1",
    "admin/order/update/([0-9]+)" => "adminOrder/update/$1",
    "admin/order/delete/([0-9]+)" => "adminOrder/delete/$1",
    "admin/order/page-([0-9]+)" => "adminOrder/index/$1",

    // Управление рецептами
    "admin/recipes/page-([0-9]+)" => "adminRecipes/index/$1",    
    "admin/search/page-([0-9]+)" => "adminRecipes/search/$1",
    // "category/([0-9]+)/page-([0-9]+)" => "catalog/category/$1/$2",

    // Статистика
    "admin/stat" => "adminStat/index",

    // Управление скидками
    "admin/discount/create" => "adminDiscount/create",
    "admin/discount/delete/([0-9]+)" => "adminDiscount/delete/$1",
    "admin/discount/update/([0-9]+)" => "adminDiscount/update/$1",
    "admin/discount/page-([0-9]+)" => "adminDiscount/index/$1",


    // Карта
    "map/?$" => "site/map",
    
    // Админка    
    "admin/?$" => "admin/index",    
    "/?$" => "site/index", // indexList в siteConroller
        
);