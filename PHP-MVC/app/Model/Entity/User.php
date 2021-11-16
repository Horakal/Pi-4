<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class User{

    /**
     * ID do usuario
     *
     * @var integer
     */
    public $id;

    /**
     * Nome do usuario
     *
     * @var string
     */
    public $nome;

    /**
     * email do usuario
     *
     * @var [string]
     */
    public $email;

    /**
     * Senha do usario
     *
     * @var string
     */
    public $senha;


    /**
     * Método responsavel por retornar um usuario com base em seu email
     *
     * @param [string] $email
     * @return Usuario
     */
    public static function getUserByEmail($email){
        return (new Database('usuarios'))->select('email ="'.$email.'"')->fetchObject(self::class);
    }
}