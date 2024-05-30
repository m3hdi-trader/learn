<?php

class Shape
{


    public function draw()
    {
        echo static::class . PHP_EOL;
    }
}


class Rectangel extends Shape
{


    //OverRiding

}

class Square extends Shape
{
}

class Circle extends Shape
{
}
// -----------------------------------------------------


// $shape->draw();
$sh = new Shape();
$sh1 = new Rectangel();
$sh2 = new Square();
echo $sh->draw();
echo $sh1->draw();
echo $sh2->draw();
