<?php

namespace App\DesignPatterns\Creational\Factory\Toy;

class Car implements ToyI
{
    public function getDescription(): string {
        return "This is a car!";
    }
}