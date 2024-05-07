<?php
function a($value){
    echo"<pre>";
    print_r($value);
    echo"</pre>";
}
$arr=array('ali','mohammad','hasan');
$arr1=array('ali',"name"=>'mohammad','hasan');
$arr2=array('name'=>'ali',"family"=>'mohammadi','age'=>'20');
$c="mohammad";

echo count($arr);
echo "<hr>";


echo sizeof($arr);
echo "<hr>";


print_r(array_keys($arr1,'mohammad'));
echo "<hr>";


print_r(array_values($arr1));
echo "<hr>";




echo (array_key_exists('name',$arr2));
echo "<hr>";


echo (in_array('ali',$arr2));
echo "<hr>";


echo(is_array($arr1));
echo "<hr>";


shuffle($arr);
a($arr);
echo "<hr>";

print_r( sort($arr));
echo "<hr>";

$num=array(7,5,9,12,45,111);
echo max($num);
echo "<hr>";

echo min($num);
echo "<hr>";

echo end($num);
echo "<hr>";

echo array_sum($num);
echo "<hr>";

echo array_rand($arr2);