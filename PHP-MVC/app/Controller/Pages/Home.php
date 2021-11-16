<?php

namespace App\Controller\Pages;

use \App\Utils\View;


class Home extends Page 
{

    public static function getHome(){
        $content = View::render('Pages/home',[
            
        ]);
        return parent::getPage('HOME - PegTurismo',$content);
    }
   
}

