<?php 

namespace App\Controller\admin;



use \App\Utils\View;
use \App\Model\Entity\Contato as ContatosViagem;
use \WilliamCosta\DatabaseManager\Pagination;



class contatos extends Page{


    private static function getContactItems($request){

        $itens = '';

       

        $results = ContatosViagem::getContato(null);

        while($obContact = $results->fetchObject(ContatosViagem::class)){
            $itens .= View::render('admin/modules/contatos/item',[
                'nome' => $obContact->nome,
                'telefone' => $obContact->celular,
                'email' => $obContact->email,
                'cpf' => $obContact->cpf,
                'destino' => $obContact->destino,
                'data' => date('d/m/y', strtotime($obContact->data))
            ]);
        }
        return $itens;
    }

    public static function getContato($request){
        
        $content = View::render('admin/modules/contatos/index', [
            'itens' => self::getContactItems($request)
        ]);

        return parent::getPanel('Contatos - PEG', $content, 'contatos');
    }
}