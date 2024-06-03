<?php
class Math
{
    public function sum($number)
    {
        $sum = 0;
        foreach ($number as $num) {
            $sum += (int)$num;
        }
        return $sum;
    }
    public static function mul($numbers)
    {
        $mul = 1;
        foreach ($numbers as $num) {
            $mul *= (int)$num;
        }
        return $mul;
    }
}

class GetSet
{
    private $id = 50;
    private $data;

    public function __get($prop)
    {
        if (isset($this->data[$prop])) {
            return $this->data[$prop] . PHP_EOL;
        } else {
            echo "property $prop not define! ";
        }
    }

    public function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

    public function __call($name, $arguments)
    {
        $math = new Math;
        return $math->{$name}($arguments);
        // echo "is__call : $name(" . implode(",", $arguments) . ")";
    }

    public static function __callStatic($name, $arguments)
    {
        return Math::{$name}($arguments);
    }
}

$gs = new GetSet();
// $gs->name = 'mohammad';
// $gs->family = 'shirani';

// // echo $gs->id;

// // print_r($gs);
// echo $gs->name;
// echo $gs->age;

echo $gs->sum(1, 2, 3) . PHP_EOL;
echo $gs::mul(1, 2, 3);
