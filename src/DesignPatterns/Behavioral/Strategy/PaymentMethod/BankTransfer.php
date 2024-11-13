<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

final class BankTransfer implements PaymentI
{
    public function pay(float $amount): void
    {
        echo "Paid " . number_format($amount, 2, '.', '') . " using Bank Transfer!";
    }
}