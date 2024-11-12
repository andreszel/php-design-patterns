<?php

use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\BankTransfer;
use PHPUnit\Framework\TestCase;

class BankTransferTest extends TestCase
{
    /**
     * @test
     * @testdox Should process payment with Bank Transfer correctly
     */
    public function testPay() {
        $strategy = new BankTransfer();
        $this->expectOutputString('Paid 100.00 using Bank Transfer!');
        $strategy->pay(100);
    }
}