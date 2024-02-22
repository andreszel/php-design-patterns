<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example1;

final class NoDiscount implements DiscountI
{
    private const DISCOUNT = 0;

    public function calculateDiscount($price)
    {
        return self::DISCOUNT;
    }
}