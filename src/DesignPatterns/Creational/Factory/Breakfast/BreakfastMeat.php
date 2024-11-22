<?php

namespace App\DesignPatterns\Creational\Factory\Breakfast;

class BreakfastMeat implements BreakfastI
{
    public function getDescription(): string
    {
        return "This is a breakfast with meat!";
    }
}