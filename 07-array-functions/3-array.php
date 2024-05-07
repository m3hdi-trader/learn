<?php
$arr=array('ali','mohammad','hasan','ali');
$arr1=array('ali',"name"=>'mohammad','hasan');
$arr2=array('name'=>'ali',"family"=>'mohammadi','age'=>'20');
$c="mohammad";


function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "<hr>";
echo "Even:";
print_r(array_filter($array2, "even"));
echo "<hr>";


$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";
$arr5=compact('city','state','event');
print_r($arr5);
echo "<hr>";


$size = "large";
$var_array = array("color" => "blue",
                   "size"  => "medium",
                   "shape" => "sphere");
extract($var_array, EXTR_PREFIX_SAME, "wddx");

echo "\$blue=$color \$medium=$size \$sphere=$shape";   


// implode()
// explode()