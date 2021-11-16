<?php

namespace App\Controller\admin;

use App\Utils\View;
use \App\Model\Entity\User;
use \App\Session\Admin\Login as SessionAdminLogin;

class Login extends page{
    
    /**
     * Método responsavel por retornar a renderizaçao da pagina de login
     *
     * @param [request] $request
     * @param string $errorMessage
     * @return string
     */
    public static function getLogin($request, $errorMessage = null){

        $status = !is_null($errorMessage) ? Alert::getError($errorMessage) 
         : '';

        //CONTEUDO DA PAGINA DE LOGIN
        $content = View::render('admin/login',[
            'status' => $status
        ]);

        //RETORNA A PÁGINA COMPLETA
        return parent::getPage('LOGIN - PegTurismo', $content);
    }

    /**
     * Método responsavel por definir o login do usuario
     *
     * @param [Request] $request
     */
    public static function setLogin($request){
        //POST VARS

        $postVars = $request->getPostVars();
        $email = $postVars['email'] ?? '';
        $senha = $postVars['senha'] ?? '';

        //BUSCA USUARIO PELO E-MAIL
        $obUser = User::getUserByEmail($email);
        if(!$obUser instanceof User){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        //VERIFICA A SENHA DO USUARIO

        if(!password_verify($senha, $obUser->senha)){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        //CRIA SESSAO DE LOGIN
        SessionAdminLogin::login($obUser);
        // REDIRECIONA O USUARIO PARA A HOME DO ADMIN
        $request->getRouter()->redirect('/admin');
    }
    /**
     * Método responsavel por deslogar o usuario
     *
     * @param [Request] $request
     */
    public static function setLogout($request){
         // Destroi ESSAO DE LOGIN
        SessionAdminLogin::logout();
        // REDIRECIONA O USUARIO PARA A TELA DE LOGIN
        $request->getRouter()->redirect('/admin/login');
    }
}