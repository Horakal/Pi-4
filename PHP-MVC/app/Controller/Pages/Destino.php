<?php

namespace App\Controller\Pages;

use \App\Utils\View;


class Destino extends Page 
{

   

    public static function getDestino(){
        $content = View::render('Pages/destino',[
            
        ]);
        return parent::getPage('DESTINO - PegTurismo',$content);
    }
   
}

