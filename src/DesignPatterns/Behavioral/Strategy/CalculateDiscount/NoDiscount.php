<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

final class NoDiscount implements DiscountI
{
    private const DISCOUNT = 0;

    public function calculateDiscount($price): float
    {
        return self::DISCOUNT;
    }
}