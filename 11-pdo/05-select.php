<?php
include_once "01-connection.php";

#region Function echoPeoples
function echoPeople($row)
{
    echo implode("-", (array)$row) . PHP_EOL;
}

function echoPeoples($rows)
{
    foreach ($rows as $row) {
        echoPeople($row);
    }
}
#endregion


#region Use fechAll
// $sql = "select * from people where age>45";
// $stmt = $db->prepare($sql);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
// echoPeoples($rows);
#endregion


#region Use fech
// $sql = "select * from people where age>45";
// $stmt = $db->prepare($sql);
// $stmt->execute();

// while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//     echoPeople($row);
// }
#endregion

#region Get Single Row
$sql = "select * from people where id=5";
$stmt = $db->prepare($sql);
$stmt->execute();

$user5 = $stmt->fetch(PDO::FETCH_OBJ);
myDump($user5);
#endregio
