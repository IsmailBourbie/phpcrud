<?php
namespace Core;
Class View {

    public static function render($view, Array $args = []) {

        $args = extract($args, EXTR_SKIP);

        $file = "../app/views/$view"; // relative to core directiory
        if(is_readable($file)) {
            require $file;
        } else {
            die('view file not exist');
        }
    }
    
}