<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Creational\Builder\Example1;

use DesignPatterns\Tutorial\Creational\Builder\Example1\Enum\PizzaSize;

class PizzaDirector
{
    public function build(PizzaBuilderInterface $builder)
    {
        $builder->setType();
        $builder->setCheeseType();
        $builder->setSauce();
        $builder->setSize(PizzaSize::BIG_SIZE);
        $builder->setSpicy();

        return $builder->getPizza();
    }
}