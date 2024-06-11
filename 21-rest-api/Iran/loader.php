<?php
define('CACHE_ENABLE', 1);
define('CACHE_DIR', __DIR__ . '/cache');

include_once "App/iran.php";


spl_autoload_register(function ($class) {
    $classFile = __DIR__ . "/" . $class . ".php";

    if (!(file_exists($classFile) and is_readable($classFile))) {
        die("$class Not Found");
    }
    include_once $classFile;
});
