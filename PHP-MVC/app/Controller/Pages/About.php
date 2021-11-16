<?php

namespace App\Controller\Pages;

use \App\Utils\View;


class About extends Page 
{

   

    public static function getAbout(){
        $content = View::render('Pages/about',[
            'name' => 'pegturismo'
        ]);
        return parent::getPage('SOBRE - PegTurismo',$content);
    }
   
}

