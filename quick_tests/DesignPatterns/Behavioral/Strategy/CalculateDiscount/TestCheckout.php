<?php

namespace App\QuickTests\DesignPatterns\Behavioral\Strategy\CalculateDiscount;

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\Checkout;
use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\CheckoutFactory;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestCheckout
{
    public static function run(): void
    {
        $couponStrategy = CheckoutFactory::create('coupon');
        $checkout = new Checkout(250, $couponStrategy);
        $totalPriceCoupon = $checkout->getTotalPrice();
        Logger::log("Total price Coupon is: " . number_format($totalPriceCoupon, 2, '.', '') . " PLN");

        $blackFridayStrategy = CheckoutFactory::create('black_friday');
        $checkout = new Checkout(250, $blackFridayStrategy);
        $totalPriceBlackFriday = $checkout->getTotalPrice();
        Logger::log("Total price Black Friday is: " . number_format($totalPriceBlackFriday, 2, '.', '') . " PLN");

        $progressStrategy = CheckoutFactory::create('progress');
        $checkout = new Checkout(250, $progressStrategy);
        $totalPriceProgress = $checkout->getTotalPrice();
        Logger::log("Total price Progress is: " . number_format($totalPriceProgress, 2, '.', '') . " PLN");

        // No discount, unknown disocunt
        $noDiscountStrategy = CheckoutFactory::create('super');
        $checkout = new Checkout(250, $noDiscountStrategy);
        $totalPriceNoDiscount = $checkout->getTotalPrice();
        Logger::log("Total price No Discount or Unknown Discount is: " . number_format($totalPriceNoDiscount, 2, '.', '') . " PLN");

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}