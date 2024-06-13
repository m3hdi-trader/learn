<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase
{
    private $value;
    // /**
    //  * @before
    //  */
    // public function setValue()
    // {
    //     $this->value = 6;
    // }

    public function testcorrectValue()
    {
        $this->value++;

        $this->assertEquals(1, $this->value);
        return $this->value;
    }

    #[Depends('testcorrectValue')]
    public function testcorrectValue2($value)
    {
        $value++;
        $this->assertEquals(2, $value);
    }

    #[DataProvider('numberProvide')]
    public function testItValidOrNot($number)
    {
        $this->assertTrue($number > 0);
    }

    public static  function numberProvide()
    {
        return [
            [1],
            [2],
            [0],
            [3],
            [4],
            [5]
        ];
    }

    public static function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}
