<?php

function sum($a, $b)
{
    return $a + $b;
}


try {
    echo sum(5); #an error ocurred
} catch (Throwable $e) {
    $msg = $e->getFile() . "Line: " . $e->getLine() . " " . $e->getMessage() . PHP_EOL;
    file_put_contents("error-logs.txt", $msg, FILE_APPEND);
} finally {
}
