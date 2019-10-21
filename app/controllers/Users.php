<?php
namespace App\Controllers;

use Core\Controller;

class Users extends Controller {
    public function add() {
        echo "add user Controller";
        echo 'id = ' . $this->route_params['id'];
    }
}