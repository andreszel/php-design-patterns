<?php

namespace App\DesignPatterns\Creational\Factory\Toy;

enum ToyType: string
{
    case Doll = 'doll';
    case Robot = 'robot';
    case Car = 'car';
}