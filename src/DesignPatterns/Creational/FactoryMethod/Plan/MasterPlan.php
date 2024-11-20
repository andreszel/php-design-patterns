<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Plan;

abstract class MasterPlan
{
    protected array $features = [];

    abstract public function getRate(): int;

    public function getFeatures(): array
    {
        return $this->features;
    }
}