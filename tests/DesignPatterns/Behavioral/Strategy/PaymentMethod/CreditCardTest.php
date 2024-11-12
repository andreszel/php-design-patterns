<?php

use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\CreditCard;
use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
{
    /**
     * @test
     * @testdox Should process payment with Credit Card correctly
     */
    public function testPay() {
        $strategy = new CreditCard();
        $this->expectOutputString('Paid 100.00 using Credit Card!');
        $strategy->pay(100);
    }
}