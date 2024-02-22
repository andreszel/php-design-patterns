<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Example1;

use DesignPatterns\Tutorial\Creational\Builder\Example1\Enum\PizzaSize;

class Pizza
{
    public string $type;
    public string $cheeseType;
    public PizzaSize $size;
    public string $sauce;
    public bool $spicy;

    public function __construct()
    {
        echo "This is pizza class!";
    }
}