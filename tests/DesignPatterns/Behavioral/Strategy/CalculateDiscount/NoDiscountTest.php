<?php

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\NoDiscount;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group calculate-discount
 * @testdox [CalculateDiscount] NoDiscount: Strategy
 */
class NoDiscountTest extends TestCase
{
    /**
     * @test
     * @testdox Should process calculate discount when no discount with NoDiscount correctly
     */
    public function testCalculateDiscountWNoDiscount()
    {
        $strategy = new NoDiscount();
        $price = 20.00;
        $expectedDiscount = 0;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }
}
