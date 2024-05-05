<?php

$str = "mehdi shirani";

$str1 = 10;
$number = 1000000;

echo is_string($str);
echo "<hr>";

// echo is_string($str1);
// echo "<hr>";

// echo strlen($str);
// echo "<hr>";

// echo lcfirst($str);
// echo "<hr>";

// echo ucfirst($str);
// echo "<hr>";

// echo ucwords($str);
// echo "<hr>";

// echo strtolower($str);
// echo "<hr>";

// echo strtoupper($str);
// echo "<hr>";

echo ltrim($str,"me");
echo "<hr>";

echo rtrim($str,"ni");
echo "<hr>";

echo trim($str);
echo "<hr>";

echo number_format($number);
echo "<hr>";