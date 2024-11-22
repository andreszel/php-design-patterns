<?php

namespace App\DesignPatterns\Creational\Factory\Toy;

class ToyFactory
{
    public function getToy(ToyType $toyType): ToyI
    {
        return match($toyType) {
            ToyType::Doll => new Doll(),
            ToyType::Robot => new Robot(),
            ToyType::Car => new Car(),
            default => throw new \Exception("Invalid toy type!")
        };
    }
}