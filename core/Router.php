<?php
namespace Core;

use App\Controllers;

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
        private function convertToRegX($route)
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
    private function match($url, $request) {
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
    

    public function dispatch($url, $request)
    {
        $url = $this->removeQueryStringVar($url);
        if($this->match($url, 'GET')) {
            // get the controller 
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if(class_exists($controller)){
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];

                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object, $action])) {
                    $controller_object->$action();

                } else {
                    die('method: ' . $action.' not exists in controller ' . $controller_object);
                }
            } else {
                die('controller ' . $controller_object . ' not exists');
            }
        } else {
            die("url not found");
        }
    }

    // convert String to study Capitals e.g user-auth => UserAuth
    private function convertToStudlyCaps($str) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    // convert a string to camel Case e.g hello-world => helloWorld    
    private function convertToCamelCase($str) {
        return lcfirst($this->convertToStudlyCaps($str));
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
}