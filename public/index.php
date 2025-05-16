<?php

require __DIR__ . "/../" . "Core/functions.php";

spl_autoload_register(function ($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path("Core/router.php");
