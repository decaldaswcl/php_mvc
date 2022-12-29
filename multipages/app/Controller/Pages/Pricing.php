<?php

namespace App\controller\Pages;

use \App\View\View;

class Pricing extends Page{

    /**
     * Metodo responsavel po retonar o conteudo da (view) da home
     * @return string
     */
    public static function getPricing(){
        $content = View::render('pages/pricing');

        return parent::getPage('Pricing', $content );
    }
}