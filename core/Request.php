<?php
namespace Core;
Class Request {
    

    
    public static function url() {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');

        return self::removeQueryStringVar($url);
    }


    // Remove Query String Variables
    private function removeQueryStringVar($url) {
        if($url != '') {
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], "=") === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }


}