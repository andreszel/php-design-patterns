<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

class Payment
{
    private $amount;
    private $strategy;

    public function __construct(float $amount, PaymentI $strategy)
    {
        $this->amount = $amount;
        $this->strategy = $strategy;
    }

    public function process(): void {
        $this->strategy->pay($this->amount);
    }
}