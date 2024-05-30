<?php
class A
{
    private $privateVar = 'A:private';
    public $publicVar = 'A:public';
    protected $protectedVar = 'A:protected';
    public function test()
    {
        echo $this->privateVar . '|' . $this->publicVar . '|' . $this->publicVar . '|';
    }
}


class B
{
    public $publicVar = 'B:hh';
}

class C extends A
{
    private $privateVar = 'C:private';
    public function test()
    {
        echo $this->privateVar . '|' . $this->publicVar . '|' . $this->publicVar . '|';
    }
}










$a1 = new A();
// echo $a1->publicVar;
$a1->test();
$b1 = new B();
echo $b1->publicVar;
$c1 = new C();

$c1->test();
