<?php

class person1
{
    public $name;
    private $age;
    private $nationalCode;
    protected $income;
    public function __construct($name)
    {
        $this->name = $name;
        $this->setNationalCode(rand(100, 1000));
    }
    // public function number($nationalCode){
    //     if($nationalCode>200){

    //     }
    // }
    #setter
    public function setNationalCode($nationalCode)
    {
        if ($nationalCode > 200) {
            $this->nationalCode = $nationalCode;
        }
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setIncome($income)
    {
        $this->income = $income;
    }
    #getter

    public function getNationalCode()
    {
        return $this->nationalCode;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getIncome()
    {
        return $this->income;
    }
}


$Mohammad = new person1("Mohammad Shirani");
echo $Mohammad->name . PHP_EOL;
$Mohammad->setIncome(500000);
echo $Mohammad->getIncome() . PHP_EOL;
echo $Mohammad->getNationalCode() . PHP_EOL;
