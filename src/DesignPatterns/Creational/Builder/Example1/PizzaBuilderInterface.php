<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Example1;

use DesignPatterns\Tutorial\Creational\Builder\Example1\Enum\PizzaSize;

interface PizzaBuilderInterface
{
    public function setType(): void;

    public function setCheeseType(): void;

    public function setSize(PizzaSize $pizzaSize): void;

    public function setSauce(): void;

    public function setSpicy(): void;

    public function getPizza(): Pizza;
}