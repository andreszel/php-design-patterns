<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

class PaymentFactory
{
    public static function create(string $paymentType): PaymentI
    {
        switch ($paymentType) {
            case 'credit_card':
                return new CreditCard();
            case 'paypal':
                return new PayPal();
            case 'bank_transfer':
                return new BankTransfer();
            default:
                throw new \RuntimeException('Unknown payment type!');
        }
    }
}