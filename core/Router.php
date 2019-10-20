<?php

Class Router {


    // Routes Table 
    public $routes = [
        "GET" => [],
        "POST" => [],
        "PUT" => [],
        "DELETE" => []
    ];

    // Save params from matched route
    public $params = [];

    // convert all string routes to regular expression
        public function convertToRegX($route)
        {
            // escape / signe
            $route = preg_replace('/\//','\\/', $route);

            // convert custom variables e.g {id:\d+}
            $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

            $route = "/^" . $route . "$/i";
            return $route;
        }

        // add route to get table
        public function get($route, $params = [] )
        {
            $route = $this->convertToRegX($route);
            $this->routes["GET"][$route] = $params;
        }
        

    // check if the requested url exists in our routes table
    public function match($url, $request) {
        foreach($this->routes[$request] as $route => $params) {
            if(preg_match($route, $url, $matches)) {
                foreach($matches as $key => $param) {
                    if(is_string($key)) {
                        $params[$key] = $param;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
}