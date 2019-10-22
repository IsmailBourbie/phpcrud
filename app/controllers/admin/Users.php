<?php
namespace App\Controllers\Admin;

use Core\Controller;

class Users extends Controller {
    public function addAction() {
        echo "add user Controller<br>";
    }

    protected function after(){
        echo "<br> this is from after function";
    }
}