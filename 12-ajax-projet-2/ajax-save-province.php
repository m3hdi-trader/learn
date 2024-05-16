<?php

sleep(2);


function getMessage($text, $class = 'success')
{
    echo "<span class='$class'>$text</span>";
    die();
}

$province = $_POST['province'];

if (strlen($province) < 3) {
    getMessage('اسم استان باید حداقل 3 حرف داشته باشد', 'error');
}

$mysqli = new mysqli('localhost', 'root', '', 'iran');


if ($mysqli->connect_errno) {
    getMessage("Failed to connect to mysql:  " . $mysqli->connect_error, 'error');
}

// echo "successfully connected  " . PHP_EOL;
$mysqli->set_charset('utf8');

$query = "INSERT into province (name) values(?)";
$stm = $mysqli->prepare($query);
$stm->bind_param('s', $province);
$stm->execute();
$stm->close();

getMessage("استان $province با موفقیت به ایران اضافه شد", 'success');
