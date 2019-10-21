<?php

use Core\Router;

// require the autoload
require '../vendor/autoload.php';

$router = new Router();


$router->get("users/add", ['controller' => 'users', 'action' => 'add' ]);
$router->get("users/{id:\d+}/add", ['controller' => 'users', 'action' => 'add' ]);


// get the url using query_string
$url = $_SERVER['QUERY_STRING'];


$router->dispatch($url, "GET");

// if($router->match())