<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Contato as ContatosViagem;



class Contato extends Page 
{


    
   

    public static function getContato(){
        $content = View::render('Pages/contato',[
            
        ]);
        return parent::getPage('CONTATO - PegTurismo',$content);
    }
    
    public static function insertContato($request){
        $postVars = $request->getPostVars();

        $obContact = new ContatosViagem;
        $obContact->nome = $postVars['nome'];
        $obContact->email = $postVars['email'];
        $obContact->celular = $postVars['celular'];
        $obContact->cpf = $postVars['cpf'];
        $obContact->destino = $postVars['destinos'];
        $obContact->data = $postVars['data'];
        $obContact->cadastrar();

        return self::getContato();
    }
}

