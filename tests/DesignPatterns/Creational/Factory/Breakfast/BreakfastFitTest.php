<?php

use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFit;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-breakfast
 */
class BreakfastFitTest extends TestCase
{
    public function testGetDescription() {
        $breakfast = new BreakfastFit();
        $this->assertInstanceOf(BreakfastFit::class, $breakfast);
        $this->assertEquals("This is a breakfast fit!", $breakfast->getDescription());
    }
}