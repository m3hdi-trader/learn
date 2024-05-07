<?php
$a = "10";
echo "<hr>";
echo gettype($a);
$b = 10;
echo "<hr>";
echo gettype($b);

$d = array();
echo "<hr>";
echo gettype($d);

$c = null;
echo "<hr>";
echo gettype($c);

$x = new stdClass;
echo "<hr>";
echo gettype($x);

$z = tmpfile();
echo "<hr>";
echo gettype($z);

$s = '';
echo "<hr>";
echo gettype($s);
echo "<hr>";


if (empty($c)) {
    echo "true: is empty";
} else {
    echo "false: is not empty";
}

echo "<hr>";

if (isset($c)) {
    echo "true: is isset";
} else {
    echo "false: is not isset";
}

// Variable handling
echo "<hr>";

echo is_null($c);
echo "<hr>";
echo is_int($b);
echo "<hr>";
echo is_integer($b);
echo "<hr>";
echo is_long($b);
echo "<hr>";


$L = array("ali", "reza");

echo is_iterable($L);
echo "<hr>";


// sample/phph?id=5
$w = "jh";
echo intval($w);
echo "<hr>";

$d = "mogammad";
$data = serialize($d);
echo $data;
echo "<hr>";
$t = unserialize($data);
echo $t;
