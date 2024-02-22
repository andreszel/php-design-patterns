<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example1;

class BlackFriday implements DiscountI
{
    public function calculateDiscount($price)
    {
        return $price * 0.3;
    }
}