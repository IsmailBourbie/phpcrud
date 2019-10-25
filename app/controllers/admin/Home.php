<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class Home extends Controller {


    public function indexAction() {
        View::render('admin/home/index.php');
    }
}