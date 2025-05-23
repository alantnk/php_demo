<?php

use Core\Session;

require __DIR__ . "/../" . "Core/functions.php";

set_exception_handler('niceExceptionHandler');


session_start();

spl_autoload_register(function ($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
