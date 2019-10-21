<?php

require "../app/controllers/Users.php";
require "../core/Router.php";

$router = new Router();


$router->get("users/add", ['controller' => 'users', 'action' => 'add' ]);


// get the url using query_string
$url = $_SERVER['QUERY_STRING'];


$router->dispatch($url, "GET");

// if($router->match())