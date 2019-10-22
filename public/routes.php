<?php


$router->get("users/add", ['controller' => 'users', 'action' => 'add', 'namespace' => 'Admin']);
$router->get("users/{user:([a-z ]+)}/add", ['controller' => 'users', 'action' => 'add', 'namespace' => 'Admin']);
$router->get("users/{id:\d+}/add", ['controller' => 'users', 'action' => 'add' ]);

