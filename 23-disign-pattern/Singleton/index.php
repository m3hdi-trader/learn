<?php

class Singleton
{
    protected function __construct()
    {
    }
    private static $instance;
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static;
        }
        return self::$instance;
    }
}

class Config extends Singleton
{
    public function getData()
    {
        return [
            'host' => '127.0.0.1'
        ];
    }
}

$config = Config::getInstance();
$config1 = Config::getInstance();
var_dump($config === $config1);
