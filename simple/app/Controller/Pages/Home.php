<?php

namespace App\controller\Pages;

use \App\View\View;

class Home extends Page{

    /**
     * Metodo responsavel po retonar o conteudo da (view) da home
     */
    public static function getHome(){
        $content = View::render('pages/home', [
            'name' => 'will',
            'description' => 'sou willian'
        ]);

        return parent::getPage('Home', $content );
    }
}