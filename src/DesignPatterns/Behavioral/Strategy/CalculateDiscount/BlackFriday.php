<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

class BlackFriday implements DiscountI
{
    private const PERCENT_DISCOUNT = 0.3;

    public function calculateDiscount($price): float
    {
        return $price * self::PERCENT_DISCOUNT;
    }
}