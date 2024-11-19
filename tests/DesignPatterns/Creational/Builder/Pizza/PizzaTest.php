<?php

use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Pizza;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group builder-pizza
 */
class PizzaTest extends TestCase
{
    public function testPizzaConstructor()
    {
        $pizza = new Pizza(PizzaSize::MEDIUM_SIZE);

        $this->assertInstanceOf(Pizza::class, $pizza);
        $this->assertEquals(PizzaSize::MEDIUM_SIZE, $pizza->size);
        $this->expectOutputString("Size: średnia!\n");
    }
}