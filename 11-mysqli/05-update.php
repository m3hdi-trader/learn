<?php
include_once "01-connection.php";

$sql="update people set sex='m' where fullname LIKE 'ali%'";

if ($mysqli->query($sql)) {
    echo "$mysqli->affected_rows Records successfully Update!" .PHP_EOL;
    
}else{
    echo "Falied to Update".PHP_EOL;
}


$ageIncval=1;

$sql1="update people set age=age+? where id<10";

$stmt=$mysqli->prepare($sql1);
$stmt->bind_param('i',$ageIncval);
$stmt->execute();
print_r($stmt);

