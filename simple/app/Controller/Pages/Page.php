<?php

namespace App\controller\Pages;

use \App\View\View;

class Page{

    /**
     * Method responsible for returning the content of the header
     * @return string
     */
    private static function get_header(){
     
        return View::render('pages/header');
    }
    /**
     * Method responsible for returning the content of the footer
     * @return string
     */
    private static function get_footer(){
     
        return View::render('pages/footer');
    }

    /**
     * Method responsible for returning the content of the basic page
     * @return string 
     */
    public static function getPage($title, $content){

        return View::render('pages/page', [
            'title'     => $title,
            'header'    => self::get_header(),
            'content'   => $content,
            'footer'    => self::get_footer()
            
        ]);
    }
}