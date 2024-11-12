<?php

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\Checkout;
use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\CheckoutFactory;
use PHPUnit\Framework\TestCase;

/**
     * @test
     * @group calculate-discount
     * @testdox [CalculateDiscount] Checkout: Integration Test
     */
class CheckoutTest extends TestCase
{
    /**
     * @test
     * @testdox Should process calculate checkout with Black Friday correctly
     */
    public function testCalculateCheckoutWithBlackFriday() {
        $strategy = CheckoutFactory::create('black_friday');
        $checkout = new Checkout(150.0, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 105.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with NoDiscount correctly
     */
    public function testCalculateCheckoutWithNoDiscount() {
        $strategy = CheckoutFactory::create('unknown');
        $checkout = new Checkout(250.0, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 250.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Progress Discount when price greather than max price correctly
     */
    public function testCalculateCheckoutWithProgressDiscountWhenPriceGreatherThanMaxPrice() {
        $strategy = CheckoutFactory::create('progress');
        $checkout = new Checkout(200.0, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 160.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Progress Discount when price between minimal and max price correctly
     */
    public function testCalculateCheckoutWithProgressDiscountWhenPriceBetweenMinimalAndMaxPrice() {
        $strategy = CheckoutFactory::create('progress');
        $checkout = new Checkout(45.0, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 40.50;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Progress Discount when price less than minimal price correctly
     */
    public function testCalculateCheckoutWithProgressDiscountWhenPriceLessThanMinimalPrice() {
        $strategy = CheckoutFactory::create('progress');
        $checkout = new Checkout(9.0, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 8.55;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Coupon Discount when price greather than minimal price correctly
     */
    public function testCalculateCheckoutWithCouponDiscountWhenPriceGreatherThanMinimalPrice() {
        $strategy = CheckoutFactory::create('coupon');
        $checkout = new Checkout(20.00, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 10.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Coupon Discount when price equal minimal price correctly
     */
    public function testCalculateCheckoutWithCouponDiscountWhenPriceEqualMinimalPrice() {
        $strategy = CheckoutFactory::create('coupon');
        $checkout = new Checkout(19.00, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 19.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }

    /**
     * @test
     * @testdox Should process payment with Coupon Discount when price less than minimal price correctly
     */
    public function testCalculateCheckoutWithCouponDiscountWhenPriceLessThanMinimalPrice() {
        $strategy = CheckoutFactory::create('coupon');
        $checkout = new Checkout(18.00, $strategy);
        $totalPrice = $checkout->getTotalPrice();
        $expectedPrice = 18.00;
        $this->assertEquals($expectedPrice, $totalPrice);
    }
}