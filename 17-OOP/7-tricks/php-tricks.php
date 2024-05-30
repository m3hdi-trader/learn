<?php

class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function printName()
    {
        echo $this->name . PHP_EOL;
    }
}

$p1 = new Person('Mehdi');
$p2 = $p1;
$p2->printName();
