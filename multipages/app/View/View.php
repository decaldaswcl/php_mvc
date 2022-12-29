<?php 

namespace App\View;

class View {
    /**
     * Variables of view
     *@var array
    */
    private static $vars = [];

    /**
     * 
     * @param array $vars
     */
    public static function init($vars = []){
        self::$vars = $vars;
    }

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

        //Merge variables 
        $vars = array_merge(self::$vars, $vars);

        //key reorganization 
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        },$keys);
        
        //returns the rendered view
        return str_replace($keys, array_values($vars),$contentView);
    }
}