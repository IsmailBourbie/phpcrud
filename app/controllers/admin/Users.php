<?php
namespace App\Controllers\Admin;

use App\Models\User;
use Core\Controller;
use Core\View;

class Users extends Controller {


    public function addAction() {
        $user = $_POST;
        User::create($user);
        $this->redirect('admin/users');
    }

    public function newAction() {
        View::render("admin/users/add.php");
    }

    public function allAction() {
        $users = User::read();
        $data = [
            "users" => $users,
            "i" => 0
        ];
        View::render("admin/users/all.php", $data);
    }

}