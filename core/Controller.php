<?php
namespace Core;

use ErrorException;

abstract Class Controller {

    protected $route_params = [];

    /**
     * constructor of the class
     * @param array $params
     */
    public function __construct($params) {
        $this->route_params = $params;
    }


    /**
     * Magic funcrion: called whene the called action not found
     * @param mixed $name
     * @param mixed $args
     * @throws Exception
     */
    public function __call($name, $args) {
        $method = $name . "Action";
        if(method_exists($this, $method)) {
            if($this->before() !== false) {
                call_user_func([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new ErrorException('method: ' . $method.' not exists in controller');
        }
    }

    /**
     * this method used as filter, whene returns false, can't call the action
     * to use this method, must be overrated in the controller
     * @access protected
     * @return bool
     */
    protected function before() {
        // Some code
        return true;
    }

    /**
     * this method colled after finish any action
     * @access protected
     */
    protected function after() {
        // Some code
    }
    

    // just helper function for die and var_dump
    public static function dd($val) {
        echo "<pre>";
            var_dump($val);
        echo "</pre>";
        die();
    }
}