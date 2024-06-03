<?php
include "autoload.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // echo "not submitted";
    return;
}
#form submit is ok
[$title, $content, $format] = [$_POST['title'], $_POST['content'], $_POST['format']];

// echo " submit ok";
$whiteList = ['Text', 'Pdf', 'Json', 'Csv'];
if (!in_array($format, $whiteList)) {
    echo "invalid format";
    return;
}
// ------------------------------------------
$className = "Exporter\\{$format}Exporter";

if (class_exists($className)) {
    $exporter = new $className(['title' => $title, 'content' => $content]);
    $exporter->export();
}
