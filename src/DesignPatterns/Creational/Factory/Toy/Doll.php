<?php

namespace App\DesignPatterns\Creational\Factory\Toy;

class Doll implements ToyI
{
    public function getDescription(): string {
        return "This is a doll!";
    }
}