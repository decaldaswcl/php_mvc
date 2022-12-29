<?php

namespace App\controller\Pages;

use \App\View\View;

class About extends Page{

    /**
     * Metodo responsavel po retonar o conteudo da (view) da home
     * @return string
     */
    public static function getAbout(){
        $content = View::render('pages/about');

        return parent::getPage('About', $content );
    }
}