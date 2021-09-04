<?php

use App\Autoloader;
use App\Core\Router;

include "Autoloader.php";
Autoloader::register();

$route = new Router();
$route->routes();
