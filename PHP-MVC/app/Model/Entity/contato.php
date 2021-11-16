<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Contato{

    public $nome;

    public $email;

    public $cpf;

    public $celular;

    public $destino;

    public $data;

    /**
     * Cadastrar no banco de dados
     *
     * @return boolean
     */
    public function cadastrar(){

        //define a data
        $this->data = date('Y-m-d');

        //insere o cliente no banco de dados
        $this->id = (new Database('contato'))->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'celular' => $this->celular,
            'destino' => $this->destino,
            'data' => $this->data

        ]);
        return true;
    }

    public static function getContato($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('contato'))->select($where,$order,$limit,$fields);
    }
}
