<?php
include "jdf.php";
date_default_timezone_set("Asia/Tehran");
echo microtime();
echo '<hr>';
 print_r (gregorian_to_jalali(2019,3,22,"/"));
 echo '<hr>';
 echo jdate('Y-m-d');