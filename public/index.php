<?php

require __DIR__ . "/../" . "functions.php";

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require base_path("router.php");
