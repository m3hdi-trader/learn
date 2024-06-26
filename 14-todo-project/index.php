<?php

include "bootstrap/init.php";


if (isset($_GET['logout'])) {
    logout();
}

if (!isLoggedIn()) {
    header("Location:" . siteUrl('auth.php'));
}

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deletedCount = delteFolder($_GET['delete_folder']);
    echo message("$deletedCount" . ' Folders successfully delete!');
}

if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    $deletedCount = delteTask($_GET['delete_task']);
    echo message("$deletedCount" . ' Tasks successfully delete!');
}


$folders = getFolders();

$tasks = getTasks();
// dd($tasks);

include "tpl/tpl-index.php";
