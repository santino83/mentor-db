<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 22.27
 */

namespace Santino83\DB\Calculator;


use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    protected function tearDown(): void
    {

    }

    public function testSum()
    {
        $expected = 7;

        $this->assertEquals($expected, $this->calculator->sum(3,4));
    }

    public function testSumALL()
    {
        $expected = 7;

        $this->assertEquals($expected, $this->calculator->sumALL(1,2,3,1));
    }

}