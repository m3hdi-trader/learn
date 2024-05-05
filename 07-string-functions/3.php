<?php


// echo stripos("mehdi shirani gol ast","shirani");
// echo "<hr>";

// echo strpos("mehdi shirani Gol gol  ast","Gol");
// echo "<hr>";

// echo md5("mehdi shirani");
// echo "<hr>";

//  https://www.w3schools.com/html/html_entities.asp;

// echo "<script>alert('hack    ed');</script>";

echo "&amp;";
echo "<hr>";

echo "&lt;";
echo "<hr>";
    
// $link = '<a href="https://www.w3schools.com/html/html_entities.asp">آدرس سایت</a>';

// echo $link;
// echo "<br>";
// echo htmlentities($link);
// echo "<hr>";

$strlink = "&lt;a href=&quot;https://www.w3schools.com/html/html_entities.asp&quot;&gt;آدرس سایت&lt;/a&gt";

echo html_entity_decode($strlink);