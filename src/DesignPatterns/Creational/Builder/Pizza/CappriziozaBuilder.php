<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Pizza;

//use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;

class CappriziozaBuilder implements PizzaBuilderInterface
{
    private const NAME = 'Capprizioza';
    private const CHEESE_NAME = 'Mozzarella';
    private const SAUCE_NAME = 'Tomato';
    private const SPICY = true;

    private $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function setType(): void
    {
        $this->pizza->type = self::NAME;

        echo "Type: " . $this->pizza->type . "\n";
    }

    public function setCheeseType(): void
    {
        $this->pizza->cheeseType = self::CHEESE_NAME;
    }

    /* public function setSize(PizzaSize $pizzaSize): void
    {
        $this->pizza->size = $pizzaSize;
    } */
    public function setSize(): void
    {
        // Rozmiar jest już ustawiony w konstruktorze `Pizza`, więc ta metoda może być pusta lub można ją usunąć
    }

    public function setSauce(): void
    {
        $this->pizza->sauce = self::SAUCE_NAME;
    }

    public function setSpicy(): void
    {
        $this->pizza->spicy = self::SPICY;
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}