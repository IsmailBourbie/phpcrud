<?php
namespace App\Controllers\Admin;

use App\Models\User;
use Core\Controller;
use Core\View;

class Users extends Controller {
    public function addAction() {

        $username = $_GET['u'];
        $data =  ['user' => 'Unkown'];
        if(User::add($username)) {
            $data['user'] = $username;
        }
        View::render('admin/users/add.php', $data);
    }

    protected function after(){
        echo "<br> this is from after function";
    }
}