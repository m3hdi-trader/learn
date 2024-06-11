<?php
define('CACHE_ENABLE', 0);
define('CACHE_DIR', __DIR__ . '/cache');


define('JWT_KEY', 'mohammad12345gegegee');
define('JWT_ALG', 'HS256');


include_once "vendor/autoload.php";
include_once "App/iran.php";


spl_autoload_register(function ($class) {
    $classFile = __DIR__ . "/" . $class . ".php";

    if (!(file_exists($classFile) and is_readable($classFile))) {
        die("$class Not Found");
    }
    include_once $classFile;
});
