<?php

require "../core/Router.php";

$router = new Router();


$router->add("", ['controller' => 'Home', 'action' => 'index' ]);
$router->add("posts", ['controller' => 'Posts', 'action' => 'index' ]);
$router->add("posts/new", ['controller' => 'Posts', 'action' => 'new' ]);


// get the url using query_string
$url = $_SERVER['QUERY_STRING'];

if($router->match($url)) {
    var_dump($router->params);
} else {
    die("url not found");
}

// if($router->match())