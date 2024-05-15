<?php
include_once "01-connection.php";


// $sql="update people set isSingle=0";
// $stmt=$db->prepare($sql);
// $stmt->execute();

// $sql="update people set isSingle=1 where id>?";
// $stmt=$db->prepare($sql);
// $stmt->execute([8]);
// echoLine($stmt->rowCount());

$sql="update people set isSingle=:isSingle where id>:id";
$stmt=$db->prepare($sql);
$stmt->execute(["id"=> 8,"isSingle"=>0]);
echoLine($stmt->rowCount());








