<?php

namespace App\DesignPatterns\Creational\Factory\Breakfast;

class BreakfastMilk implements BreakfastI
{
    public function getDescription(): string
    {
        return "This is a breakfast with milk!";
    }
}