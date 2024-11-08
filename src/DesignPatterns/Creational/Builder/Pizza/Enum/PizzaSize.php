<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum;

enum PizzaSize: string
{
    case SMALL_SIZE = 'mała';
    case MEDIUM_SIZE = 'średnia';
    case BIG_SIZE = 'duża';
}