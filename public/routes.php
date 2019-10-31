<?php

$router->get("admin/dashboard",['controller' => 'home', 'action' => 'index', 'namespace' => 'Admin']);
$router->get("admin/users",['controller' => 'users', 'action' => 'all', 'namespace' => 'Admin']);
$router->get("admin/users/add", ['controller' => 'users', 'action' => 'add', 'namespace' => 'Admin']);

// $router->get("users/{user:([a-z ]+)}/add", ['controller' => 'users', 'action' => 'add', 'namespace' => 'Admin']);
// $router->get("users/{id:\d+}/add", ['controller' => 'users', 'action' => 'add' ]);

