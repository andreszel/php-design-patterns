<?php

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\DiscountCoupon;
use PHPUnit\Framework\TestCase;

/**
     * @test
     * @group calculate-discount
     * @testdox [CalculateDiscount] DiscountCoupon: Strategy
     */
class DiscountCouponTest extends TestCase
{
    /**
     * @test
     * @testdox Should process calculate discount with price greather than minimal price with Coupon correctly
     */
    public function testCalculateDiscountCouponWithPriceGreatherThanMinimalPrice() {
        $strategy = new DiscountCoupon();
        $price = 20.00;
        $expectedDiscount = 10.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }

    /**
     * @test
     * @testdox Should process calculate discount with price equal to minimal price with Coupon correctly
     */
    public function testCalculateDiscountCouponWithPriceEqualToMinimalPrice() {
        $strategy = new DiscountCoupon();
        $price = 19.00;
        $expectedDiscount = 0.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }

    /**
     * @test
     * @testdox Should process calculate discount with price less than minimal price with Coupon correctly
     */
    public function testCalculateDiscountCouponWithPriceLessThanMinimalPrice() {
        $strategy = new DiscountCoupon();
        $price = 18.00;
        $expectedDiscount = 0.00;
        $this->assertEquals($expectedDiscount, $strategy->calculateDiscount($price));
    }
}