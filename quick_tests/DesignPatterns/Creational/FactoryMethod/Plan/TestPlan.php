<?php

namespace App\QuickTests\DesignPatterns\Creational\FactoryMethod\Plan;

use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFactory;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestPlan
{
    public static function run(): void
    {
        $planFactory = new PlanFactory();
        $plan = $planFactory->createPlan('pro');
        //$plan = $planFactory->createPlan('pro');
        if ($plan) {
            echo 'Rate: ' . $plan->getRate() . "\n";
            foreach ($plan->getFeatures() as $feature) {
                echo '- ' . $feature . "\n";
            }
            echo "\n";
        }

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}