<?php
include_once "01-connection.php";
$usereId=4;
$sql="delete from people where id= ?";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param('i',$usereId);
$stmt->execute();
$stmt->close();
