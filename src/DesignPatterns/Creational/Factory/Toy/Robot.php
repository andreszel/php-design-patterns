<?php

namespace App\DesignPatterns\Creational\Factory\Toy;

class Robot implements ToyI
{
    public function getDescription(): string {
        return "This is a robot!";
    }
}