<?php

namespace App\DesignPatterns\Creational\Factory\Breakfast;

class BreakfastFactory
{
    private array $registry = [];

    public function registryBreakfast(string $breakfastType, callable $creator): void
    {
        $this->registry[$breakfastType] = $creator;
    }

    public function getBreakfast(string $breakfastType): BreakfastI
    {
        if (!isset($this->registry[$breakfastType])) {
            throw new \Exception("Invalid breakfast type!");
        }

        return call_user_func($this->registry[$breakfastType]);
    }
}