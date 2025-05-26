<?php

use Core\Session;
use Core\ValidationException;

session_start();

require __DIR__ . "/../" . "Core/functions.php";

set_exception_handler('niceExceptionHandler');



require base_path('vendor/autoload.php');

require base_path('bootstrap.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();
