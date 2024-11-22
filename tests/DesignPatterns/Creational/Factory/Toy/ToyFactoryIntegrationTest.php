<?php

use App\DesignPatterns\Creational\Factory\Toy\ToyFactory;
use App\DesignPatterns\Creational\Factory\Toy\ToyType;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-toy
 */
class ToyFactoryIntegrationTest extends TestCase
{
    public function testManufacturedToys()
    {
        $toyFactory = new ToyFactory();

        $dollToy = $toyFactory->getToy(ToyType::Doll);
        $robotToy = $toyFactory->getToy(ToyType::Robot);
        $carToy = $toyFactory->getToy(ToyType::Car);

        $this->assertEquals("This is a doll!", $dollToy->getDescription());
        $this->assertEquals("This is a robot!", $robotToy->getDescription());
        $this->assertEquals("This is a car!", $carToy->getDescription());
    }
}