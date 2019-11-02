<?php
namespace App\Controllers\Admin;

use App\Models\User;
use Core\Controller;
use Core\View;

class Users extends Controller {


    public function addAction() {
        $data = [
            "username" => "ismail_bourbie",
            "fname" => "bourbie",
            "lname" => "ismail",
            "age" => 25
        ];
        User::create($data);
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