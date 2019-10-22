<?php
namespace Core;
abstract Class Controller {

    protected $route_params = [];

    public function __construct($params)
    {
        $this->route_params = $params;
    }


    public function __call($name, $args)
    {
        $method = $name . "Action";
        if(method_exists($this, $method)) {
            if($this->before() !== false) {
                call_user_func([$this, $method], $args);
                $this->after();
            }
        } else {
            die('method: ' . $method.' not exists in controller ');
        }
    }


    // this func must return true te call the action
    // this func must overrated
    protected function before() {
        // Some code
        return true;
    }


    // this func called after the func actio done
    protected function after() {
        // Some code
    }
    
}