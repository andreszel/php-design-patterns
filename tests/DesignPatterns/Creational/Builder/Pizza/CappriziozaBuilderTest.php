<?php

use DesignPatterns\Tutorial\Creational\Builder\Pizza\CappriziozaBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Pizza;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group builder-pizza
 */
class CappriziozaBuilderTest extends TestCase
{
    public function testSetType()
    {
        $size = PizzaSize::MEDIUM_SIZE;
        $pizza = new Pizza($size);
        $builder = new CappriziozaBuilder($pizza);

        ob_start();
        $builder->setType();
        $output = ob_get_clean();
        
        $this->assertEquals("Type: Capprizioza\n", $output);
        $this->assertEquals('Capprizioza', $pizza->type);
    }

    public function testSetCheeseType()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new CappriziozaBuilder($pizza);
        $builder->setCheeseType();

        $this->assertEquals('Mozzarella', $pizza->cheeseType);
    }

    public function testSetSauce()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new CappriziozaBuilder($pizza);
        $builder->setSauce();

        $this->assertEquals('Tomato', $pizza->sauce);
    }

    public function testSetSpicy()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new CappriziozaBuilder($pizza);
        $builder->setSpicy();

        $this->assertTrue($pizza->spicy);
    }

    public function testGetPizzaCapprizioza()
    {
        $pizza = new Pizza(PizzaSize::BIG_SIZE);
        $builder = new CappriziozaBuilder($pizza);

        $builder->setType();
        $builder->setCheeseType();
        $builder->setSauce();
        $builder->setSpicy();

        $resultPizza = $builder->getPizza();

        $this->assertSame($pizza, $resultPizza);
        $this->assertEquals('Capprizioza', $resultPizza->type);
        $this->assertEquals('Mozzarella', $resultPizza->cheeseType);
        $this->assertEquals('Tomato', $resultPizza->sauce);
        $this->assertTrue($resultPizza->spicy);
    }
}