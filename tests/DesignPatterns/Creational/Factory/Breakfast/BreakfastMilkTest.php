<?php

use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMilk;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-breakfast
 */
class BreakfastMilkTest extends TestCase
{
    public function testGetDescription() {
        $breakfast = new BreakfastMilk();
        $this->assertInstanceOf(BreakfastMilk::class, $breakfast);
        $this->assertEquals("This is a breakfast with milk!", $breakfast->getDescription());
    }
}