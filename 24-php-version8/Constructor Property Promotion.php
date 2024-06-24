<?php

class Car
{
    public int $year;
    public string $model;
    public string $color;

    public function __construct(int $year, string $model, string $color)
    {
        $this->year = $year;
        $this->model = $model;
        $this->color = $color;
    }

    public function data()
    {
        return $this;
    }
}

$car = new Car(2020, 'BMW', 'Red');
// var_dump($car->data());

// echo "\n----\n";

class Car2
{
    public function __construct(public int $year, public string $model, public string $color)
    {
    }

    public function data()
    {
        return $this;
    }
}

$car2 = new Car2(2020, 'BMW', 'Blue');
// var_dump($car2->data());

// echo "\n----\n";
class Car3 extends Car2
{
    public function __construct($year, $model, $color, public string $name)
    {
        parent::__construct($year, $model, $color);
    }
}

$car3 = new Car3(2020, 'BMW', 'Blue', 'm6');
// var_dump($car3->data());
