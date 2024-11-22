<?php

namespace App\DesignPatterns\Creational\Factory\Breakfast;

class BreakfastFit implements BreakfastI
{
    public function getDescription(): string
    {
        return "This is a breakfast fit!";
    }
}