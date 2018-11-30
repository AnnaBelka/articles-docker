<?php

use Classes\Components\DataBase;
use Classes\Components\Routing;

require __DIR__ . '/../vendor/autoload.php';
$routes = include(__DIR__ .'/../config/routes.php');



$route = new Routing();

//$route->run($routes);