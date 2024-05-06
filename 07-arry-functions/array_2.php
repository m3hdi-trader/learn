<?php
function a($value){
    echo"<pre>";
    print_r($value);
    echo"</pre>";
}
$arr=array('ali','mohammad','hasan','ali');
$arr1=array('ali',"name"=>'mohammad','hasan');
$arr2=array('name'=>'ali',"family"=>'mohammadi','age'=>'20');
$c="mohammad";

// array_splice()

a(array_chunk($arr,2));
echo"<hr>";


print_r(array_merge($arr,$arr1));
echo"<hr>";

print_r(array_unique($arr));
echo"<hr>";

print_r(array_reverse($arr1));
echo"<hr>";

print_r(array_search('ali',$arr2));
echo"<hr>";

print_r(array_diff($arr1,$arr2));
echo"<hr>";

print_r(array_slice($arr2,1));
echo"<hr>";

// array_splice

echo array_shift($arr2);
echo"<hr>";

print_r($arr2) ;
echo"<hr>";

array_push($arr,"mehdi","amir");
print_r($arr);
echo"<hr>";

array_pop($arr);
print_r($arr);
echo"<hr>";

$arr4=array_fill(0,8,"amir");
a($arr4);
echo"<hr>";
print_r($arr4);








