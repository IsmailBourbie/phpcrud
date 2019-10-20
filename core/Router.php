<?php

Class Router {


    // Routes Table 
    public $routes = [];

    // Save params from matched route
    public $params = [];

    // add route to routes table
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    // check if the requested url exists in our routes table
    public function match($url) {
        foreach($this->routes as $route => $params) {
            if($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
}