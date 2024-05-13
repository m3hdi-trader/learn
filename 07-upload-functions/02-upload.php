<?php
session_start();

$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uploadBtn'])  && $_POST['uploadBtn'] == 'upload') {

        if (isset($_FILES['uploadFile']) && !empty($_FILES['uploadFile'])) {
            // Create variable file
            $fileName = $_FILES['uploadFile']['name'];
            $fileTmpName = $_FILES['uploadFile']['tmp_name'];
            $fileSize = $_FILES['uploadFile']['size'];
            $fileType = $_FILES['uploadFile']['type'];
            $fileNameSeprate = explode('.', $fileName);
            $fileEx = strtolower(end($fileNameSeprate));
            $newFileName = md5(time() . $fileName) . '.' . $fileEx;
            $allowedFileEx = ['txt', 'png', 'doc','zip','jpg'];
            // Conditions Upload files
            if (in_array($fileEx, $allowedFileEx)) {
                $allowedMaxFileSize = 5 * 1024 * 1024;
                if ($fileSize < $allowedMaxFileSize) {
                    $uploadFlieDir = 'upload/';
                    $destPath = $uploadFlieDir . $newFileName;
                    if (move_uploaded_file($fileTmpName, $destPath)) {
                        $msg = 'فایل شما با موفقیت آپلود شد';
                    } else {
                        $msg = 'خطا در آپلود فایل!!';
                    }
                } else {
                    $msg = "حجم فایل شما مجاز نمی باشد";
                }
            } else {
                $msg = "فایل شما مجاز نمی باشد!";
            }
        } else {
            $msg = 'لطفا فایل مورد نظر خود را انتخاب نمایید !';
        }
    }
}
// Create Session
$_SESSION['msg'] = $msg;
header("location:01-upload.php");
