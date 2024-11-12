<?php

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\ProgressDiscount;
use PHPUnit\Framework\TestCase;

/**
     * @test
     * @group calculate-discount
     * @testdox [CalculateDiscount] ProgressDiscount: Strategy
     */
class ProgressDiscountTest extends TestCase
{
    /**
     * @test
     * @testdox Should process calculate discount with price greather than max price with ProgressDiscount correctly
     */
    public function testCalculateProgressDiscountWithPriceGreatherThanMaxPrice() {
        $strategy = new ProgressDiscount();
        $price = 60.00;
        $expectedDiscount = 12.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }

    /**
     * @test
     * @testdox Should process calculate discount with price between minimal and max price with ProgressDiscount correctly
     */
    public function testCalculateProgressDiscountWithPriceBetweenMinimalAndMaxPrice() {
        $strategy = new ProgressDiscount();
        $price = 40.00;
        $expectedDiscount = 4.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }

    /**
     * @test
     * @testdox Should process calculate discount with price less than minimal price with ProgressDiscount correctly
     */
    public function testCalculateProgressDiscountWithPriceLessThanMinimalPrice() {
        $strategy = new ProgressDiscount();
        $price = 8.00;
        $expectedDiscount = 0.40;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }
}