<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Plan\Pro;

use App\DesignPatterns\Creational\FactoryMethod\Plan\Plan as MasterPlan;

class Plan extends MasterPlan
{
    private const RATE = 150;

    protected array $features = ['Unlimited emails', 'Unlimited contacts', '24-7 support'];

    public function getRate(): int
    {
        return self::RATE;
    }
}