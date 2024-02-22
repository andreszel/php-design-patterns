<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example1;

final class ProgressDiscount implements DiscountI
{
    private const MIN_PERCENT_DISCOUNT = 0.05;
    private const MIDDLE_PERCENT_DISCOUNT = 0.1;
    private const MAX_PERCENT_DISCOUNT = 0.2;
    private const MIN_PRICE = 10;
    private const MAX_PRICE = 50;

    public function calculateDiscount($price)
    {
        if($price > self::MAX_PRICE) {
            return $price * self::MAX_PERCENT_DISCOUNT;
        }elseif($price > self::MIN_PRICE && $price <= self::MAX_PRICE) {
            return $price * self::MIDDLE_PERCENT_DISCOUNT;
        }else{
            return $price * self::MIN_PERCENT_DISCOUNT;
        }
    }
}