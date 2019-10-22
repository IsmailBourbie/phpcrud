<?php

use Core\Request;
use Core\Router;

// require the autoload
require '../vendor/autoload.php';


Router::load('routes.php')->dispatch(Request::url(), Request::method());
