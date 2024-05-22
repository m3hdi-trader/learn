<?php
include_once "../bootstrap/init.php";


if (!isAjaxRequest()) {
    diePage("invalid request");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("invalid action ");
}

switch ($_POST['action']) {

        //region case addfolder
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo message("نام فولدر باید بیشتر از دو حرف باشد", 'red');
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
        //endregion

        //region add task
    case "addTask":

        $folderId = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];

        if (!isset($folderId) || empty($folderId)) {
            echo message("فولدر خود را انتخاب کنید", 'red');
            die();
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 3) {
            echo message("نام تسک باید بیشتر از دو حرف باشد", 'red');
            die();
        }
        echo addTask($taskTitle, $folderId);
        break;
        //endregion 
    case "doneSwitch":
        $taskId = $_POST['taskId'];
        if (!isset($taskId) || !is_numeric($taskId)) {
            echo message("آیدی معتبر نمی باشد", 'red');
            die();
        }
        doneSwitch($taskId);


        break;
    default:
        diePage("invalid action ");
}
