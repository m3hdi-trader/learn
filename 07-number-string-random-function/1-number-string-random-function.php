<?php
echo rand(1, 10);
echo "<hr>";
echo mt_rand();
echo "<hr>";
echo $rand1 = random_int(10, 100);
echo gettype($rand1);
echo "<hr>";
echo $rand2 = random_bytes(3);
echo gettype($rand2);
echo "<hr>";
echo $rand3 = bin2hex(random_bytes(3));
echo gettype($rand3);
echo "<hr>";
// ------------------------------------------------------
function greatRandomString($lenght): string
{
    $chars = "0123456789zxcvbnm,./';lkjhgfdsaqwertyuiop[]";
    $charsLenght = strlen($chars);
    $randomjString = '';
    for ($i = 0; $i < $lenght; $i++) {
        $randomjString .= $chars[rand(0, $charsLenght - 1)];
    }
    return $randomjString;
}
echo greatRandomString(5);
