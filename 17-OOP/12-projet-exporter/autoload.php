<?php
spl_autoload_register(function ($class) {
    $classFile = __DIR__ . "/$class.php";

    if (file_exists($classFile) and is_readable($classFile)) {
        include $classFile;
    } else {
        die('Class Load Error ...');
    }
});
