<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Plan;

use App\DesignPatterns\Creational\FactoryMethod\Plan\MasterPlan;

class PlanPro extends MasterPlan
{
    private const RATE = 150;

    protected array $features = ['Unlimited emails', 'Unlimited contacts', '24-7 support'];

    public function getRate(): int
    {
        return self::RATE;
    }
}