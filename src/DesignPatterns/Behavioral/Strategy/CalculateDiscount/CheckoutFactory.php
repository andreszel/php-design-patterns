<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

use RuntimeException;

class CheckoutFactory
{
    public static function create($price, $discountType)
    {
        switch($discountType)
        {
            case 'coupon':
                $discount = new DiscountCoupon();
                break;
            case 'black_friday':
                $discount = new BlackFriday();
                break;
            case 'progress':
                $discount = new ProgressDiscount();
                break;
            default:
                throw new RuntimeException('Unknown discount type');
        }

        return new Checkout($price, $discount);
    }
}