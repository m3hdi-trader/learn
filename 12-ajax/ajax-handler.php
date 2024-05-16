<?php

define('FILE_NAME', 'data.txt');

$data = $_POST['data'];


if (strlen($data) < 10) {
    echo 'امکان ذخیر برای فقط متن های بالای 10 حرف وجود داره';
    die();
}

file_put_contents(FILE_NAME, $data . PHP_EOL, FILE_APPEND);

$file_content = file_get_contents(FILE_NAME);
echo nl2br($file_content);
