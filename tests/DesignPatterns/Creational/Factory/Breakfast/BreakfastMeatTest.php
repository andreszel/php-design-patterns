<?php

use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMeat;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-breakfast
 */
class BreakfastMeatTest extends TestCase
{
    public function testGetDescription() {
        $breakfast = new BreakfastMeat();
        $this->assertInstanceOf(BreakfastMeat::class, $breakfast);
        $this->assertEquals("This is a breakfast with meat!", $breakfast->getDescription());
    }
}