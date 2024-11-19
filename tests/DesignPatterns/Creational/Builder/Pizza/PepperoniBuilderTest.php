<?php

use DesignPatterns\Tutorial\Creational\Builder\Pizza\PepperoniBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Pizza;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group builder-pizza
 */
class PepperoniBuilderTest extends TestCase
{
    public function testSetType()
    {
        $size = PizzaSize::MEDIUM_SIZE;
        $pizza = new Pizza($size);
        $builder = new PepperoniBuilder($pizza);

        ob_start();
        $builder->setType();
        $output = ob_get_clean();
        
        $this->assertEquals("Type: Pepperoni\n", $output);
        $this->assertEquals('Pepperoni', $pizza->type);
    }

    public function testSetCheeseType()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new PepperoniBuilder($pizza);
        $builder->setCheeseType();

        $this->assertEquals('Mozzarella', $pizza->cheeseType);
    }

    public function testSetSauce()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new PepperoniBuilder($pizza);
        $builder->setSauce();

        $this->assertEquals('Marinara', $pizza->sauce);
    }

    public function testSetSpicy()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new PepperoniBuilder($pizza);
        $builder->setSpicy();

        $this->assertNotTrue($pizza->spicy);
    }

    public function testGetPizzaPepperoni()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new PepperoniBuilder($pizza);

        $builder->setType();
        $builder->setCheeseType();
        $builder->setSauce();
        $builder->setSpicy();

        $resultPizza = $builder->getPizza();

        $this->assertSame($pizza, $resultPizza);
        $this->assertEquals('Pepperoni', $resultPizza->type);
        $this->assertEquals('Mozzarella', $resultPizza->cheeseType);
        $this->assertEquals('Marinara', $resultPizza->sauce);
        $this->assertNotTrue($resultPizza->spicy);
    }
}