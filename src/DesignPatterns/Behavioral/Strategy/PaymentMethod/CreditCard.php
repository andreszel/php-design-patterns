<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

class CreditCard implements PaymentI
{
    public function pay(float $amount): void
    {
        echo "Paid " . number_format($amount, 2, '.', '') . " using Credit Card!";
    }
}