<?php

class Sheep
{
    private $name;
    private static $count;

    public function __construct()
    {
        $this->name = "sheep-" . rand(100, 9999) . PHP_EOL;
        self::$count++;
    }

    public function baaa()
    {
        echo "$this->name:baaaa" . str_repeat('a', rand(1, 20)) . PHP_EOL;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

// $sheep = new Sheep();
// $sheep->baaa();
// $sheep->baaa();
// $sheep->baaa();
