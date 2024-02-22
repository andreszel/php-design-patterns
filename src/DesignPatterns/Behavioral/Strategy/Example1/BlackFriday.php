<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example1;

class BlackFriday implements DiscountI
{
    private const PERCENT_DISCOUNT = 0.3;

    public function calculateDiscount($price)
    {
        return $price * self::PERCENT_DISCOUNT;
    }
}