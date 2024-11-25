<?php

namespace App\QuickTests\DesignPatterns\Creational\Builder\Pizza;

use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\CappriziozaBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\PepperoniBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Pizza;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\PizzaDirector;

class TestPizza
{
    public static function run(): void
    {
        $pizzaSize = PizzaSize::MEDIUM_SIZE;
        $pizzaBuilder = new CappriziozaBuilder(new Pizza($pizzaSize));
        $pizzaDirector = new PizzaDirector();
        $pizza = $pizzaDirector->build($pizzaBuilder);

        Logger::log(ConstHelper::SEPARATOR);

        $pizzaSize = PizzaSize::SMALL_SIZE;
        $pizzaBuilder = new PepperoniBuilder(new Pizza($pizzaSize));
        $pizzaDirector = new PizzaDirector();
        $pizza = $pizzaDirector->build($pizzaBuilder);

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}