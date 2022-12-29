<?php

namespace App\controller\Pages;

use \App\View\View;

class Contact extends Page{

    /**
     * Metodo responsavel po retonar o conteudo da (view) da home
     * @return string
     */
    public static function getContact(){
        $content = View::render('pages/contact');

        return parent::getPage('Contact us', $content );
    }
}