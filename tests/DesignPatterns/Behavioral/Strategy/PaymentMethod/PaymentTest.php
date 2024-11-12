<?php

use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\BankTransfer;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\CreditCard;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\Payment;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\PayPal;
use PHPUnit\Framework\TestCase;

/**
     * @test
     * @testdox Payment: Integration Test
     */
class PaymentTest extends TestCase
{
    /**
     * @test
     * @testdox Should process payment with Credit Card correctly
     */
    public function testPayWithCreditCard() {
        $strategy = new CreditCard();
        $payment = new Payment(150.0, $strategy);
        $this->expectOutputString('Paid 150.00 using Credit Card!');
        $payment->process();
    }

    /**
     * @test
     * @testdox Should process payment with PayPal correctly
     */
    public function testPayWithPayPal() {
        $strategy = new PayPal();
        $payment = new Payment(250.0, $strategy);
        $this->expectOutputString('Paid 250.00 using PayPal!');
        $payment->process();
    }

    /**
     * @test
     * @testdox Should process payment with Bank Transfer correctly
     */
    public function testPayWithBankTransfer() {
        $strategy = new BankTransfer();
        $payment = new Payment(350.0, $strategy);
        $this->expectOutputString('Paid 350.00 using Bank Transfer!');
        $payment->process();
    }
}