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
        $this->dd($users);
    }

    protected function after(){
        echo "<br> this is from after function";
    }
}