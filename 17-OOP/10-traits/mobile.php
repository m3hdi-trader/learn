<?php
include "traits.php";

class Mobile
{
    private $cpu = 'snapdragon 744';
    use HasName, ToString, ArrayAndJason, Singleton;
}

$mob = Mobile::getInstance();

$mob->setName('Galaxy s20');
echo $mob->getName() . PHP_EOL;

echo $mob->tostiringPrint();

var_dump($mob->asArray());
var_dump($mob->asJason());
