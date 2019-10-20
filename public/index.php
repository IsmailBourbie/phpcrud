<?php

require "../core/Router.php";

$router = new Router();


// $router->add("{hello}/{world}", ['controller' => 'Home', 'action' => 'index' ]);
$router->get("posts", ['controller' => 'Posts', 'action' => 'index' ]);
$router->get("posts/new", ['controller' => 'Posts', 'action' => 'new' ]);
$router->get("posts/{id:\d+}/new", ['controller' => 'Posts', 'action' => 'new' ]);


// get the url using query_string
$url = $_SERVER['QUERY_STRING'];


var_dump($router->routes);

if($router->match($url, 'GET')) {
    var_dump($router->params);
} else {
    die("url not found");
}

// if($router->match())