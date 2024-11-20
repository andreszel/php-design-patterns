<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Plan;

/**
 * Dzięki metodzie wytwórczej możemy w wygodny sposób tworzyć obiekty o wspólnych cechach z pominięciem jawnego używania
 * słowa kluczowego(operatora) new. Za pomocą abstrakcji określamy wspólne pola i metody, następnie dziedziczymy lub
 * implementujemy tą abstrakcję i dzięki klasie bazowej tworzymy "potomków", czyli obiekty o wspólnych polach i metodach.
 * 
 */
class PlanFactory
{
    public function createPlan($plan = 'free'): MasterPlan
    {
        $planName = "App\\DesignPatterns\\Creational\\FactoryMethod\\Plan\\Plan" . ucwords($plan);

        if (!class_exists($planName)) {
            throw new \Exception('A class with the name ' . $planName . ' could not be found!');
        }

        return new $planName;
    }
}