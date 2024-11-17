<?php

namespace App\DesignPatterns\Behavioral\Strategy\PaymentMethod;

class Payment
{
    private float $amount;
    private PaymentI $paymentStrategy;

    public function __construct(float $amount, PaymentI $paymentStrategy)
    {
        $this->amount = $amount;
        $this->paymentStrategy = $paymentStrategy;
    }

    public function setStrategy(PaymentI $paymentStrategy): void
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function process(): void {
        $this->paymentStrategy->pay($this->amount);
    }
}