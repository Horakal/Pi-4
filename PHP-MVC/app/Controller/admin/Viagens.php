<?php 

namespace App\Controller\admin;

require 'app\Model\Entity\viagens.php';
use \App\Utils\View;
use \App\Model\Entity\Viagem;

class viagens extends Page{
    private static function getViagemItems($request){
        $itens = ''; 
        $results = Viagem::getViagem(null,'id ASC', null, 'id ,nome, cod_destino');
        
        while($obContact = $results->fetchObject(Viagem::class)){
            $itens .= View::render('admin/modules/viagem/item',[
                'id' => $obContact->id,
                'cod_destino' => $obContact->cod_destino,
                'nome' => date('d/m/y', strtotime($obContact->nome)),
                
            ]);
        }
        return $itens;
    }

    public static function getViagens($request){        
        $content = View::render('admin/modules/viagem/index', [
            'itens' => self::getViagemItems($request),
            'stats' => self::getStatus($request)
        ]);
        return parent::getPanel('Viagem - PEG', $content, 'viagens');
    }

    public static function getNewViagem(){
        $content = View::render('admin/modules/viagem/form', [
            
        ]);
        return parent::getPanel('Cadastrar Viagem - PEG', $content, 'viagens');
    }
    
    public static function insertViagem($request){
        $postVars = $request->getPostVars();
        
        $obContact = new Viagem;
        $obContact->nome = $postVars['nome'];
        $obContact->cod_destino = $postVars['cod_destino'];
        
        $obContact->cadastrar();
      
        return self::getNewViagem();

    }

    private static function getStatus($request){
        $queryParams = $request->getQueryParams();
        
        if (!isset($queryParams['status'])) return ''; 
     
        switch ($queryParams['status']) {
            case 'created':
                return Alert::getSuccess('Viagem criada com sucesso!');
                break;
            case 'updated':
                return Alert::getSuccess('Viagem editada com sucesso!');
                break;
            case 'deleted':
                return Alert::getSuccess('Viagem deletada com sucesso!');
                break;         
        }
    }

    public static function editNewViagem($request, $id){

        $obContact = Viagem::getViagemById($id);

        if(!$obContact instanceof Viagem){
            $request->getRouter()->redirect('/admin/viagem');
        }


        $content = View::render('admin/modules/viagem/edit', [
            'stats' => self::getStatus($request),
            'nome' => $obContact->nome,
            'cod_destino' => $obContact->cod_destino
            
        ]);
        return parent::getPanel('Editar Viagem - PEG', $content, 'viagens');
    }
    public static function setEditNewViagem($request, $id){

        $obContact = Viagem::getViagemById($id);
    
        if(!$obContact instanceof Viagem){
            $request->getRouter()->redirect('/admin/viagem');
        }
        
        $postVars = $request->getPostVars();

        $obContact->nome = $postVars['nome'] ?? $obContact->nome;
        $obContact->cod_destino = $postVars['cod_destino'] ?? $obContact->cod_destino;

        $obContact->atualizar();
        
        $request->getRouter()->redirect('/admin/viagem/'.$obContact->id.'/edit?status=updated');
    }
    
    public static function deleteViagem($request, $id){

        $obContact = Viagem::getViagemById($id);

        if(!$obContact instanceof Viagem){
            $request->getRouter()->redirect('/admin/viagem');
        }


        $content = View::render('admin/modules/viagem/delete', [
            'nome' => $obContact->nome,
            'cod_destino' => $obContact->cod_destino    
        ]);
        return parent::getPanel('Excluir Viagem - PEG', $content, 'viagens');
    }

    public static function setDeleteViagem($request, $id){

        $obContact = Viagem::getViagemById($id);
    
        if(!$obContact instanceof Viagem){
            $request->getRouter()->redirect('/admin/viagem');
        }
        
        $obContact->excluir();
        
        $request->getRouter()->redirect('/admin/viagem?status=deleted');
    }
}

