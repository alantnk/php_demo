<?php

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
