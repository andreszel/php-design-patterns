<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Pizza;

use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;

class Pizza
{
    public string $type;
    public string $cheeseType;
    public PizzaSize $size;
    public string $sauce;
    public bool $spicy;

    public function __construct(PizzaSize $size)
    {
        $this->size = $size;
        echo "Size: " . $size->value . "!\n";
    }
}