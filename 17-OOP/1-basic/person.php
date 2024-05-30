<?php
class person
{
    public $name = 'Mohammad';
    private $age;
    public function printName()
    {
        echo "Name : " . $this->name . PHP_EOL;
    }
    public function setAge($newAge)
    {
        $this->age = $newAge;
    }
    public function printAge()
    {
        echo "Age : " . $this->age . PHP_EOL;
    }
}

class programer extends person
{
    public function code()
    {
        echo "codeing" . PHP_EOL;
    }
}

// $ali = new person();
// $ali->name = "ali";
// $ali->printName();
// $ali->setAge(45);
// $ali->printAge();

$mehdi = new programer();
$mehdi->name = 'hasan';
$mehdi->printName();
$mehdi->code();
