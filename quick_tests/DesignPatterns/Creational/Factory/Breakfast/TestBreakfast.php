<?php

namespace App\QuickTests\DesignPatterns\Creational\Factory\Breakfast;

use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFactory;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFit;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMeat;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMilk;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestBreakfast
{
    public static function run(): void
    {
        $breakfastFactory = new BreakfastFactory();
        $breakfastFactory->registryBreakfast('milk', fn() => new BreakfastMilk());
        $breakfastFactory->registryBreakfast('meat', fn() => new BreakfastMeat());
        $breakfastFactory->registryBreakfast('fit', fn() => new BreakfastFit());

        $milkBreakfast = $breakfastFactory->getBreakfast('milk');
        $meatBreakfast = $breakfastFactory->getBreakfast('meat');
        $fitBreakfast = $breakfastFactory->getBreakfast('fit');

        echo "Maked breakfast: \n";

        echo $milkBreakfast->getDescription() . "\n";
        echo $meatBreakfast->getDescription() . "\n";
        echo $fitBreakfast->getDescription() . "\n";

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}