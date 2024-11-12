<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

final class DiscountCoupon implements DiscountI
{
    public const MINIMAL_DISCOUNT = 0;
    public const DISCOUNT = 10;
    public const MINIMAL_PRICE = 19;

    public function calculateDiscount($price): float
    {
        if($price > self::MINIMAL_PRICE) {
            return self::DISCOUNT;
        }else{
            return self::MINIMAL_DISCOUNT;
        }
    }
}