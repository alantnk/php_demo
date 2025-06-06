<?php

use Core\Response;
use Core\Session;

function niceExceptionHandler($ex)
{
    // Tell the user something unthreatening
    echo "Sorry! Something unexpected happened. Please try again later.";
    // Log more detailed information for a sysadmin to review
    error_log("{$ex->getMessage()} in {$ex->getFile()} @ {$ex->getLine()}");
    error_log($ex->getTraceAsString());
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}


function base_path($path)
{
    return $_SERVER['DOCUMENT_ROOT'] . "/../" . $path;
}

function view($path, $attrs = [])
{
    extract($attrs);
    require base_path("views/" . $path);
}

function redirect($path)
{
    header("location: {$path}");
    die();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
