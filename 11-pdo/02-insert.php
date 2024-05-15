<?php
include_once "01-connection.php";


// $sql="INSERT INTO people(fullname,age) values(?,?)";
// $stmt=$db->prepare($sql);
// $stmt->execute(["Hasan",55]);


// $sql="INSERT INTO people(fullname,age) values(:fullname,:age)";
// $stmt=$db->prepare($sql);
// $stmt->execute(["fullname"=>"mehdi","age"=>55]);

// echoLine("insert id : ".$db->lastInsertId());


$sql="INSERT INTO people(fullname,age,sex,isSingle) values(?,?,?,?)";
$stmt=$db->prepare($sql);
$users=[
    ["sara",60,"f",0],
    ["mehdi",60,"m",0],
    ["ali",60,"m",0]
];
$db->beginTransaction();
foreach ($users as $user) {
    // if ($user[0]= "mehdi") {
    //     exit();
    // }
    $stmt->execute($user);
    
}
$db->commit();









