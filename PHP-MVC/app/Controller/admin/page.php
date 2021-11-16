<?php

namespace App\Controller\admin;

use \App\Utils\View;

class Page{

    /**
     * móduloes disponiveis no painel
     *
     * @var array
     */
    private static $modules = [
        'home' => [
            'label' => 'Home',
            'link' => URL.'/admin'
        ],
        'contato' => [
            'label' => 'Usuarios',
            'link' => URL.'/admin/contatos'
        ],
        'viagens' => [
            'label' => 'Viagens',
            'link' => URL.'/admin/viagem'
        ]
    ];

    /**
     * Método responsavel por retornar o conteudo {view} da estrutura genérica de pagina do painel
     *
     * @param [string] $title
     * @param [string] $content
     * @return string
     */
    public static function getPage($title, $content){
        return View::render('admin/page',[
            'title' => $title,
            'content' => $content
        ]);     
    }
    /**
     * Método responsavel por renderizar a vie do menu do painel
     *
     * @param [type] $currentModule
     * @return void
     */
    private static function getMenu($currentModule){
        //LINKS DO MENU
        $links = '';

        //ITERA OS MODULOS
        foreach(self::$modules as $hash=>$module){
            $links .= View::render('admin/menu/link', [
                'label' => $module['label'],
                'link' => $module['link'],
                'current' => $hash == $currentModule ? 'text-danger' : ''
            ]);
        }

        //RETORNA A RENDE DO MENU
        return View::render('admin/menu/box',[
            'links' => $links
        ]);
    }

    /**
     * M<étodo reponsavel por renderizar a view do painel com cnteudos dinamicos
     *
     * @param [string] $title
     * @param [string] $content
     * @param [string] $currentModule
     * @return string
     */
    public static function getPanel($title, $content, $currentModule){
        //RENDERIZA A VIEW DO PAINEL
        $contentPanel = View::render('admin/panel', [
            'menu' => self::getMenu($currentModule),
            'content' => $content
        ]);

        return self::getPage($title, $contentPanel);
    }

}