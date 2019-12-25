<?php
return array(
    //'news/([a-z]+)/([0-9]+)' => "news/view/$1/$2",
    //'news/([0-9]+)' => "news/view/$1",
        
    //'news' => 'news/index', // actionIndex в NewsController
    //'products' => 'products/list', // actionList в  ProductsController

    "product/([0-9]+)" => "product/view/$1",
    "catalog" => "catalog/index",
    "category/([0-9]+)/page-([0-9]+)" => "catalog/category/$1/$2",
    "category/([0-9]+)" => "catalog/category/$1",
    "user/register" => "user/register",
    "user/login" => "user/login",
    "user/logout" => "user/logout",
    "cabinet/edit" => "cabinet/edit",
    "cabinet" => "cabinet/index",  
    "contacts" => "site/contacts",
    "about" => "site/about",    

    "cart/add/([0-9]+)" => "cart/add/$1",
    "cart/addAjax/([0-9]+)" => "cart/addAjax/$1",
    "cart/productRemove/([0-9]+)" => "cart/productRemove/$1",
    "cart/productAdd/([0-9]+)" => "cart/productAdd/$1",
    "cart/checkout" => "cart/checkout",
    "cart" => "cart/index",    

    //Управление товарами    
    "admin/product/create" => "adminProduct/create",
    "admin/product/update/([0-9]+)" => "adminProduct/update/$1",
    "admin/product/delete/([0-9]+)" => "adminProduct/delete/$1",
    "admin/product" => "adminProduct/index",

    // Управление категориями        
    "admin/category/create" => "adminCategory/create",
    "admin/category/update/([0-9]+)" => "adminCategory/update/$1",
    "admin/category/delete/([0-9]+)" => "adminCategory/delete/$1",
    "admin/category" => "adminCategory/index",

    //Управление заказами    
    "admin/order/view/([0-9]+)" => "adminOrder/view/$1",
    "admin/order/update/([0-9]+)" => "adminOrder/update/$1",
    "admin/order/delete/([0-9]+)" => "adminOrder/delete/$1",
    "admin/order" => "adminOrder/index",
    //Админка
    "admin" => "admin/index",
    "" => "site/index", // indexList в siteConroller
        
);