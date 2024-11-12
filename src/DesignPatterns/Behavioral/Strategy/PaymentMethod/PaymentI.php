<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

interface PaymentI
{
    public function pay(float $amount): void;
}