<?php
include_once "01-connection.php";

$sql = "
CREATE TABLE people(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullname varchar(256),
    age int UNSIGNED ,
    sex enum('f','m'),
    isSngle boolean DEFAULT 1
);
";
if($mysqli->query($sql)){
    echo " Table successfully created".PHP_EOL;

}else{
    echo " Table is not created".PHP_EOL;
}
// For Table create-----------------------------
// $sql = "
// CREATE TABLE *TABLE*(
//     id int PRIMARY KEY AUTO_INCREMENT,
//     fullname varchar(256),
//     age int UNSIGNED ,
//     sex enum('f','m'),
//     isSngle boolean DEFAULT 1
// );
// ";

// for ($i =1;$i<=3;$i++){
//     $table_sql=str_replace("*TABLE*","people$i",$sql);
//     if($mysqli->query($table_sql)){
//         echo " Table successfully created".PHP_EOL;
    
//     }else{
//         echo " Table is not created".PHP_EOL;
//     }


// }
// for ($i =0;$i<=3;$i++){
//     $mysqli->query("drop table people$i ");

// }

   

