<?php

require __DIR__ . '/../vendor/autoload.php';
$routes = include(__DIR__ .'/../config/routes.php');
$route = new Classes\Components\Routing();

$route->run($routes);