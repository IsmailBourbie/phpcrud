<?php
namespace Core;
abstract Class Controller {

    protected $route_params = [];

    public function __construct($params)
    {
        $this->route_params = $params;
    }
    
}