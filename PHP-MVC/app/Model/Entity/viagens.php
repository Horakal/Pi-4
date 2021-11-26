<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Viagem{
    public $id;

    public $nome;

    public $cod_destino;
    /**
     * Cadastrar no banco de dados
     *
     * @return boolean
     */
    public function cadastrar(){
        //insere o cliente no banco de dados
        $this->id = (new Database('data_viagem'))->insert([
            'id' => $this->id,
            'nome' => $this->nome,
            'cod_destino' => $this->cod_destino      
        ]); 
        return true;
    }

    public function atualizar(){
        //insere o cliente no banco de dados
        return (new Database('data_viagem'))->update('id = '.$this->id,[
            'nome' => $this->nome,
            'cod_destino' => $this->cod_destino      
        ]); 
        
    }

    public function excluir(){
        //insere o cliente no banco de dados
        return (new Database('data_viagem'))->delete('id = '.$this->id)
           
        ; 
        
    }

    public static  function getViagemById($id){
        return self::getViagem('id = '.$id)->fetchObject(self::class);
    }

    public static function getViagem($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('data_viagem'))->select($where,$order,$limit,$fields);
    }
}
