<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

class Checkout
{
    private float $price;
    private DiscountI $discountStrategy;

    public function __construct(float $price, DiscountI $discountStrategy)
    {
        $this->price = $price;
        $this->discountStrategy = $discountStrategy;
    }

    public function setStrategy(DiscountI $discountStrategy): void
    {
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotalPrice(): float
    {
        return $this->price - $this->discountStrategy->calculateDiscount($this->price);
    }
}