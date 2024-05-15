<?php
include_once "01-connection.php";


$sql="delete from people where age>:age";
$stmt=$db->prepare($sql);
$stmt->execute(["age"=>59]);
echoLine("delete row: ".$stmt->rowCount());








