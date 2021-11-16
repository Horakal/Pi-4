<?php

namespace App\Session\Admin;

class Login{

    /**
     * <étodo responsavel por inciar a sessao
     *
     */
    private static function init(){
        //VERIFICA SE A SESSAO NÃO ESTÁ ATIVA
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    /**
     * Método reponsavel por criar o login do usario
     *
     * @param User $obUser
     * @return boolean
     */
    public static function login($obUser){
        //INICIA A SESSAO
        self::init();

        $_SESSION['admin']['usuario'] = [
            'id' => $obUser->id,
            'nome' => $obUser->nome,
            'email' => $obUser->email
        ];
        return true;

    }

    /**
     * Verifica se o usuario estao logado
     *
     * @return boolean
     */
    public static function isLogged(){
        //INICIA A SESSAO
        self::init();

        //RETORNA A VERIFICAÇAO
        return isset($_SESSION['admin']['usuario']['id']);
    }

    public static function logout(){
        //INICIA A SESSAO
        self::init();

        //DESLOGA O USUARIO
        unset($_SESSION['admin']['usuario']);

        return true;
    }

}