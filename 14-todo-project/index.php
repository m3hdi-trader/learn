<?php


include "bootstrap/init.php";

if (isset($_GET['delete_dolder']) && is_numeric($_GET['delete_dolder'])) {
    $deletedCount = delteFolder($_GET['delete_dolder']);
    echo "$deletedCount folders successfully delete!";
}

$folders = getFolders();

$tasks = getTasks();


include "tpl/tpl-index.php";
