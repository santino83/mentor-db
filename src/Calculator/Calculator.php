<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 22.12
 */

namespace Santino83\DB\Calculator;


class Calculator
{

    /**
     * Sums two integers
     *
     * @param int $a first addend
     * @param int $b second addend
     * @return int the sum
     */
    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * Sums multiple integer addenda
     *
     * @param int ...$addenda the addenda
     * @return int the sum
     */
    public function sumALL(int ...$addenda): int
    {
        return array_reduce($addenda, function(int $carry,int $addend){
            return $carry + $addend;
        }, 0);
    }

}