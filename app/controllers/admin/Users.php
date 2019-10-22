<?php
namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class Users extends Controller {
    public function addAction() {
        $data =  ['x' => 3];
        View::render('admin/users/add.php', $data);
    }

    protected function after(){
        echo "<br> this is from after function";
    }
}