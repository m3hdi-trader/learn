<?php
include_once "../bootstrap/init.php";


if (!isAjaxRequest()) {
    diePage("invalid request");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("invalid action ");
}

switch ($_POST['action']) {
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo " نام فولدر باید بیشتر از دو حرف باشد";
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
    default:
        diePage("invalid action ");
}
