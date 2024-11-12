<?php

use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\PayPal;
use PHPUnit\Framework\TestCase;

class PayPalTest extends TestCase
{
    /**
     * @test
     * @testdox Should process payment with PayPal correctly
     */
    public function testPay() {
        $strategy = new PayPal();
        $this->expectOutputString('Paid 100.00 using PayPal!');
        $strategy->pay(100);
    }
}