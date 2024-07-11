<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Plan;

class PlanFactory
{
    public function createPlan($plan = 'free'): Plan
    {
        $planName = "App\\DesignPatterns\\Creational\\FactoryMethod\\Plan\\" . ucwords($plan) . "\\Plan";

        if (!class_exists($planName)) {
            throw new \Exception('A class with the name ' . $planName . ' could not be found!');
        }

        return new $planName;
    }
}