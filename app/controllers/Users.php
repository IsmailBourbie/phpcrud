<?php
namespace App\Controllers;

use Core\Controller;

class Users extends Controller {
    public function addAction() {
        echo "add user Controller<br>";
        echo 'id = ' . $this->route_params['id'];
    }

    protected function after(){
        echo "<br> this is from after function";
    }
}