<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

class CheckoutFactory
{
    public static function create($discountType): DiscountI
    {
        switch($discountType)
        {
            case 'coupon':
                return new DiscountCoupon();
            case 'black_friday':
                return new BlackFriday();
            case 'progress':
                return new ProgressDiscount();
            default:
                return new NoDiscount();
        }
    }
}