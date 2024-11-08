<?php

namespace App\DesignPatterns\Behavioral\Strategy\CalculateDiscount;


interface DiscountI
{
    public function calculateDiscount($price);
}