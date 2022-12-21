<?php 

namespace App\View;

class View {
     
    /**
     * Responsible for returning the content of view
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        //path to file
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        
        return file_exists($file) ? file_get_contents($file) : '';
    }


    /**
     * Responsible for render view
     * @param string $view
     * @param array $vars
     * @return string
     */
    public static function render($view, $vars = []){
        //Get view content
        $contentView = self::getContentView($view);
        
        //key reorganization 
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        },$keys);
        
        //returns the rendered view
        return str_replace($keys, array_values($vars),$contentView);
    }
}