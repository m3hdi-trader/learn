<?php

class Shape
{
    protected $name = 'Shape';

    public function draw()
    {
        echo $this->name . PHP_EOL;
    }
}


class Rectangel extends Shape
{
    protected $name = 'Rectangle';

    //OverRiding
    public function draw()
    {
        echo 'iam a Rectangle' . PHP_EOL;
    }
}

class Square extends Shape
{
    protected $name = 'Square';
}

class Circle extends Shape
{
    protected $name = 'Circle';
}
// -----------------------------------------------------
$Rec = new Rectangel();
$Square = new Square();

var_dump($Rec instanceof Square);

// $shape->draw();
