<?php
namespace Core;

use ErrorException;

Class Router {


    // Routes Table 
    private $routes = [
        "GET" => [],
        "POST" => [],
        "PUT" => [],
        "DELETE" => []
    ];

    // Save params from matched route
    private $params = [];


    /**
     * Create an instanc of the Router and Load routes file
     * @param string $file
     * @return Router $router
     * @throws \Exception
     */
    public static function load($file) {
        $router = new static;
        if(file_exists($file)) {
            require $file;
        } else {
            throw ErrorException('file not exists');
        }
        return $router;
    }

    /**
     * Convert the route path from string to regular expression
     * @param string $route
     * @return mixed|string
     */
    private function convertToRegX($route) {
        // escape '/' signe
        $route = preg_replace('/\//','\\/', $route);

        // convert custom variables e.g {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // add the start and end delimiter
        $route = "/^" . $route . "$/i";
        return $route;
    }

    /**
     * add routes for GET Request Method
     * @param string $route
     * @param Array $params of the route
     */
    public function get($route, $params = []) {
        $route = $this->convertToRegX($route);
        $this->routes["GET"][$route] = $params;
    }
        

    /**
     * match the requestd url with our routes
     * @param string $url
     * @param string $request
     * @return bool
     */
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
    
    /**
     * Dispatch the requested url to the controller and action depending on his params
     * @param string $url
     * @param string $request
     * @throws Exception
     */
    public function dispatch($url, $request) {
        if($this->match($url, 'GET')) {
            // get the controller 
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . "$controller";

            if(class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    throw new ErrorException('method: ' . $action.' not exists in controller ' . $controller);
                }
            } else {
                throw new ErrorException('controller ' . $controller . ' not exists');
            }
        } else {
            throw new ErrorException("url not found", 404);
        }
    }

    /**
     * convert String to study Capitals e.g user-auth => UserAuth
     * @param string $str
     * @return string
     */
    private function convertToStudlyCaps($str) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    /**
     * convert a string to camel Case e.g hello-world => helloWorld
     * @param string $str
     * @return string
     */
    private function convertToCamelCase($str) {
        return lcfirst($this->convertToStudlyCaps($str));
    }


    // check if there is namespace
    /**
     * get the default namespace or from route's params
     * @return string
     */
    private function getNamespace() {
        $namespace = 'App\Controllers\\';

        if(array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . "\\";
        }
        return $namespace;
    }
}