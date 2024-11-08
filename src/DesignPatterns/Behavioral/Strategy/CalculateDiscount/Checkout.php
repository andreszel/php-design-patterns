<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

class Checkout
{
    private $price;
    private $strategy;

    public function __construct($price, DiscountI $strategy)
    {
        $this->price = $price;
        $this->strategy = $strategy;
    }

    // if we want change strategy object at runtime
    public function setStrategy(DiscountI $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getTotalPrice()
    {
        return $this->price - $this->strategy->calculateDiscount($this->price);
    }
}