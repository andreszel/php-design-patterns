<?php

use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFactory;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFit;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastI;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMeat;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMilk;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-breakfast
 */
class BreakfastFactoryTest extends TestCase
{
    private BreakfastFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new BreakfastFactory();
        $this->factory->registryBreakfast('milk', fn() => new BreakfastMilk());
        $this->factory->registryBreakfast('meat', fn() => new BreakfastMeat());
        $this->factory->registryBreakfast('fit', fn() => new BreakfastFit());
    }

    public function testGetMilkBreakfast()
    {
        $breakfast = $this->factory->getBreakfast('milk');
        $this->assertInstanceOf(BreakfastMilk::class, $breakfast);
    }

    public function testGetMeatBreakfast()
    {
        $breakfast = $this->factory->getBreakfast('meat');
        $this->assertInstanceOf(BreakfastMeat::class, $breakfast);
    }

    public function testGetFitBreakfast()
    {
        $breakfast = $this->factory->getBreakfast('fit');
        $this->assertInstanceOf(BreakfastFit::class, $breakfast);
    }

    public function testInvalidBreakfastType()
    {
        $this->expectException(\Exception::class);
        $this->factory->getBreakfast('invalidType');
    }

    public function testDynamicBreakfastTypeRegistration()
    {
        $this->factory->registryBreakfast('sweet', fn() => new class implements BreakfastI {
            public function getDescription(): string
            {
                return "This is a breakfast sweet!";
            }
        });
        $breakfast = $this->factory->getBreakfast('sweet');
        $this->assertEquals("This is a breakfast sweet!", $breakfast->getDescription());
    }
}