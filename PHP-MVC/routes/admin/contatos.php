<?php


use \App\Http\Response;
use \App\Controller\Admin;

//ROTA DE CONTATOS
$obRouter->get('/admin/contatos',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request){
        return new Response(200,admin\contatos::getContato($request));
    }
]);
