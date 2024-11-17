<?php

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\BlackFriday;
use PHPUnit\Framework\TestCase;

class BlackFridayTest extends TestCase
{
    /**
     * @test
     * @testdox Should process calculate discount when BlackFriday correctly
     */
    public function testCalculateDiscountWNoDiscount()
    {
        $strategy = new BlackFriday();
        $price = 20.00;
        $expectedDiscount = 6.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }
}
