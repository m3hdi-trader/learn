<?php
echo file_exists('dir\test.txt') . '<hr>';
echo is_file('dir\test.txt') . '<hr>';
echo is_dir('dir') . '<hr>';
$dirpath = "dir\New-dir";


if (!file_exists($dirpath)) {
    mkdir($dirpath);
} else {
    echo "warnig";
}
echo "<hr>";
// unlink('dir/New-dir/index.html');
// @unlink('dir/New-dir/index.html');
echo "<hr>";
// if (file_exists('dir/New-dir/index.html')) {
//     unlink('dir/New-dir/index.html');
// } else {
//     echo "warnig";
// }
// $dirpath = "dir/test2.txt";
// $fileOpen = fopen($dirpath, 'a+');
// for ($i = 0; $i <= 10; $i++) {
//     fwrite($fileOpen, "log $i =>" . date("Y-m-d h:i:s", time()) . PHP_EOL);
// }

// fclose($fileOpen);
// echo "<hr>";
// --------------------------------------------------------------
$dirpath = "dir/test2.txt";
// $fileOpen = fopen($dirpath, 'a+');
// for ($i = 0; $i <= 5; $i++) {
//     echo $read = fgetc($fileOpen) . '<br>';
// }

// fclose($fileOpen);

// echo "<hr>";
// $dirpath = "dir/test2.txt";
// $fileOpen = fopen($dirpath, 'a+');
// for ($i = 0; $i <= 23; $i++) {
//     echo $read1 = fgets($fileOpen, 10) . "<br>";
// }

// fclose($fileOpen);
// echo "<hr>";
// $str = "This is new txt" . PHP_EOL;
// file_put_contents($dirpath, $str, FILE_APPEND);
// $str2 = file_get_contents($dirpath);
// echo nl2br($str2);

echo filesize($dirpath);
echo "<hr>";
echo filetype($dirpath);
echo "<hr>";
// chown($dirpath, 'root');
// chgrp($dirpath, 'root');
// chmod($dirpath,0000);
$list = glob('*/*.txt');
// i?*
var_dump($list);
