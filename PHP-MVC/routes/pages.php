<?php


use \App\Http\Response;
use \App\Controller\Pages;

$obRouter->get('/',[
    
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);
$obRouter->get('/sobre',[
    function(){
        return new Response(200,Pages\About::getAbout());
    }
]);

$obRouter->get('/destinos',[
    function(){
        return new Response(200,Pages\Destino::getDestino());
    }
]);

$obRouter->get('/contato',[
    function(){
        return new Response(200,Pages\Contato::getContato());
    }
]);

$obRouter->post('/contato',[
    function($request){
        return new Response(200,Pages\Contato::insertContato($request));
    }
]);