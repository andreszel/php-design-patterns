<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Example1;

use DesignPatterns\Tutorial\Creational\Builder\Example1\Enum\PizzaSize;

class CappriziozaBuilder implements PizzaBuilderInterface
{
    private const NAME = 'Caprizioza';
    private $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function setType(): void
    {
        $this->pizza->type = self::NAME;
    }

    public function setCheeseType(): void
    {
        $this->pizza->cheeseType = self::NAME;
    }

    public function setSize(PizzaSize $pizzaSize): void
    {
        $this->pizza->size = $pizzaSize;
    }

    public function setSauce(): void
    {
        $this->pizza->sauce = 'kkkss';
    }

    public function setSpicy(): void
    {
        $this->pizza->spicy = true;
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}