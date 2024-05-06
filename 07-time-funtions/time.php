<?php

date_default_timezone_set("Asia/Tehran");
echo date('Y/m/d');
echo '<hr>';
echo date('l');
echo '<hr>';
echo date(' Y/m/d h/i/sa');
// date_default_timezone_get
echo '<hr>';

echo $time= time();
echo '<hr>';
echo date(' Y/m/d h/i/sa',$time);
echo '<hr>';
echo $mk=mktime(12,10,2,2,2,2020);
echo '<hr>';
echo $str=strtotime('4:25pm july 20 2021');
echo '<hr>';

echo $str1=strtotime('tomorrow');
echo date(' Y/m/d h/i/sa',$str1);
