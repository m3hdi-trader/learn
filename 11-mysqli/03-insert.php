<?php
include_once "01-connection.php";

$sex_array = ['m', 'f'];
$userData = array(
    'fullname' => "Mohammad " . rand(100, 999),
    'age' => rand(10, 100),
    'sex' => $sex_array[rand(0, 1)],
    'isSngle' => rand(0, 1)
);

// safe query:use prepare statement----------------------------------------------------
// function userAdd($userData)
// {
//     global $mysqli;
//     $sql = "insert into people(fullname,age,sex,isSngle) values(?,?,?,?)";
//     $stmt = $mysqli->prepare($sql);
   
//     $stmt->bind_param('sisi',
//         $userData['fullname'],
//         $userData['age'],
//         $userData['sex'],
//         $userData['isSngle']
//     );
   
//     $stmt->execute();
//     // $stmt->close();
//     return $stmt->insert_id;
// }
// $addUser=userAdd([
//     'fullname'=>'ali',
//     'age'=>20,
//     'sex'=>'m',
//     'isSngle'=>1,
// ]);
// echo "added user $addUser";


// unsafe query----------------------------------------------------------------------

$sql="insert into people(fullname,age,sex,isSngle)
 values('{$userData['fullname']}',{$userData['age']},
 '{$userData['sex']}','{$userData['isSngle']}')";

//  echo $sql;
// print_r($sql);

if($mysqli->query($sql)){
    echo " user  added".PHP_EOL;

}else{
    echo " cannot user added".PHP_EOL;
}