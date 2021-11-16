<?php

namespace App\Controller\admin;

use \App\Utils\View;

class Alert{

    /**
     * Método responsavel por retoanr uma mensagem de sucesso
     *
     * @param [string] $message
     * @return string
     */
    public static function getError($message){
        return View::render('admin/alert/status',[
        'tipo' => 'danger',
        'mensagem' => $message
        ]);
    }

    /**
     * Método responsavel por retoanr uma mensagem de sucesso
     *
     * @param [string] $message
     * @return string
     */
    public static function getSuccess($message){
        return View::render('admin/alert/status',[
        'tipo' => 'success',
        'mensagem' => $message
        ]);
    }
}