<?php

use App\Classes\Student;
use App\Classes\Person;
use App\Classes\Teacher;

include 'autoload.php';


$p1 = new Person();
$p1->printName();


$t1 = new Teacher();
$t1->printName();

$s1 = new Student;
$s1->printName();
