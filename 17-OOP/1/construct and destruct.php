<?php

class Car
{

    public $brand;
    public $model;
    public $color;
    public function __construct($brand, $model, $color)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        echo "$this->color $this->brand $this->model created!\n";
    }
    public function printInfo()
    {
        echo "$this->color $this->brand $this->model \n";
    }
    public function __destruct()
    {
        echo "$this->color $this->brand $this->model destroied!\n";
    }
}



$pride = new car('pride', 'x12', 'Red');
echo $pride->printInfo();
$bmw = new car('BMW', 'x6', 'Blue');
echo $bmw->printInfo();
$audi = new car('audi', 'rs7', 'Black');
echo $audi->printInfo();
