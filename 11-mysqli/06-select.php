<?php
include_once "01-connection.php";
// include_once "style.php";

// Select--------------------------------------------
// $sql = "select * from people";
// $result=$mysqli->query($sql);

// echo "<table>";
// echo "<tbody>";
// while ($row = $result->fetch_assoc()) {
//     echo "<tr>";
//     foreach ($row as $key => $value) {
//         echo "<td> $value</td>";
     
//     };
//     echo "</tr>";
// }
// print_r($result->fetch_assoc()).PHP_EOL;
// echo "</tbody>";
// echo "</table>";


// echo "<pre>";
// print_r($result).PHP_EOL;
// echo "</pre>";


// Select one result----------------------------------------------------------
// $sql = "select avg(age) as age_averge , count(*) as population from people";
// $smt = $mysqli->prepare($sql);
// $smt->execute();
// $smt->bind_result($age_averge,$population);
// $smt->fetch();
// echo "<br>age average is $age_averge";
// echo "<br>population is $population";

// another slect 
// $sql = "select age,fullname from people";
// $smt = $mysqli->prepare($sql);
// $smt->execute();
// $smt->bind_result($age,$fullname);

// while ($smt->fetch()) {
//    echo "<div>$fullname : $age</div>";
// }

// count record

$sql = "select age,fullname from people";
$smt = $mysqli->prepare($sql);
$smt->execute();
$smt->store_result();
echo $smt->affected_rows;




