<?php
session_start();

$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uploadBtn'])  && $_POST['uploadBtn'] == 'upload') {

        if (isset($_POST['uploadFile']) && !empty($_POST['uploadFile'])) {
            echo $msg = 'ok';
        } else {
            echo $msg = 'لطفا فایل مورد نظر خود را انتخاب نمایید !';
        }
    }
}

$_SESSION['msg'] = $msg;
header("location:01-upload.php");
