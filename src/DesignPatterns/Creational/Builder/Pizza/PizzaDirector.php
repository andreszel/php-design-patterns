<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Pizza;

use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;

class PizzaDirector
{
    public function build(PizzaBuilderInterface $builder)
    {
        $builder->setType();
        $builder->setCheeseType();
        $builder->setSauce();
        $builder->setSpicy();

        return $builder->getPizza();
    }
}