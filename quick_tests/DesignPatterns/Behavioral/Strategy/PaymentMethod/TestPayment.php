<?php

namespace App\QuickTests\DesignPatterns\Behavioral\Strategy\PaymentMethod;

use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\Payment;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\PaymentFactory;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestPayment
{
    public static function run(): void
    {
        $paymentStrategyPayPal = PaymentFactory::create('paypal');
        $paymentStrategyCreditCard = PaymentFactory::create('credit_card');
        $paymentStrategyBankTransfer = PaymentFactory::create('bank_transfer');
        $payment = new Payment(220, $paymentStrategyPayPal);
        $payment->process();
        Logger::log("");
        $payment = new Payment(230, $paymentStrategyCreditCard);
        $payment->process();
        Logger::log("");
        $payment = new Payment(240, $paymentStrategyBankTransfer);
        $payment->process();

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}