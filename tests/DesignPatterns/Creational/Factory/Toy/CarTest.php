<?php

use App\DesignPatterns\Creational\Factory\Toy\Car;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-toy
 */
class CarTest extends TestCase
{
    public function testDescription() {
        $car = new Car();
        $this->assertInstanceOf(Car::class, $car);
        $this->assertEquals("This is a car!", $car->getDescription());
    }
}