<?php

namespace App\Controller\admin;

use App\Utils\View;

class Home extends page{
    
    /**
     * Método responsavel por renderizar a view de home do painel
     *
     * @param [type] $request
     * @return void
     */
    public static function getHome(){
        //CONTEUDO DA HOME
        $content = View::render('admin/modules/home/index', []);

        return parent::getPanel('Home - PEG', $content, 'home');
    }
    
}