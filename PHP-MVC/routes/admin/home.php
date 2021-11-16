<?php


use \App\Http\Response;
use \App\Controller\Admin;

//ROTA ADMIN
$obRouter->get('/admin',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function(){
        return new Response(200,admin\Home::getHome());
    }
]);
