<?php


use \App\Http\Response;
use \App\Controller\Admin;

//ROTA DE CONTATOS
$obRouter->get('/admin/viagem',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request){
        return new Response(200,admin\viagens::getViagens($request));
    }
]);

$obRouter->get('/admin/viagem/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request){
        return new Response(200,admin\viagens::getNewViagem($request));
    }
]);

$obRouter->get('/admin/viagem/{id}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request, $id){
        return new Response(200,admin\viagens::editNewViagem($request, $id));
    }
]);

$obRouter->post('/admin/viagem/{id}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request, $id){
        return new Response(200,admin\viagens::setEditNewViagem($request, $id));
    }
]);

$obRouter->post('/admin/viagem/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request){
        return new Response(200,admin\viagens::insertViagem($request));
    }
]);


$obRouter->get('/admin/viagem/{id}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request, $id){
        return new Response(200,admin\viagens::deleteViagem($request, $id));
    }
]);

$obRouter->post('/admin/viagem/{id}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    
    function($request, $id){
        return new Response(200,admin\viagens::setDeleteViagem($request, $id));
    }
]);