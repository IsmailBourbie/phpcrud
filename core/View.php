<?php
namespace Core;

use ErrorException;

Class View {

    /**
     * render the specific file basing on the orderd view
     * @static
     * @param string $view
     * @param array $args : by default is an empty array
     */
    public static function render($view, Array $args = []) {

        $args = extract($args, EXTR_SKIP);

        $file = "../app/views/$view"; // relative to core directiory
        if(is_readable($file)) {
            require $file;
        } else {
            throw new ErrorException("This view not exists");
        }
    }
    
}