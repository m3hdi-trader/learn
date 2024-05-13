<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mail($email,$subject,$message,'From: m3hdi.trader@gmail.com');

header('location:index.php');
exit();