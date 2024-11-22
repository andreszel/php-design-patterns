<?php

use App\DesignPatterns\Creational\Factory\Toy\Car;
use App\DesignPatterns\Creational\Factory\Toy\Doll;
use App\DesignPatterns\Creational\Factory\Toy\Robot;
use App\DesignPatterns\Creational\Factory\Toy\ToyFactory;
use App\DesignPatterns\Creational\Factory\Toy\ToyType;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-toy
 */
class ToyFactoryTest extends TestCase
{
    private ToyFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new ToyFactory();
    }

    public function testGetDollToy()
    {
        $toy = $this->factory->getToy(ToyType::Doll);
        $this->assertInstanceOf(Doll::class, $toy);
    }

    public function testGetRobotToy()
    {
        $toy = $this->factory->getToy(ToyType::Robot);
        $this->assertInstanceOf(Robot::class, $toy);
    }

    public function testGetCarToy()
    {
        $toy = $this->factory->getToy(ToyType::Car);
        $this->assertInstanceOf(Car::class, $toy);
    }

    public function testInvalidToyType()
    {
        try {
            $invalidToyType = ToyType::from('invalidType');
            $this->factory->getToy($invalidToyType);
        } catch (\ValueError $e) {
            $this->assertEquals('ValueError', get_class($e));
            return;
        }

        $this->fail("Expected ValueError not thrown");
    }
}