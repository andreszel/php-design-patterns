<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example1;


interface DiscountI
{
    public function calculateDiscount($price);
}