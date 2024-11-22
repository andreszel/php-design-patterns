<?php

use App\DesignPatterns\Creational\Factory\Toy\Robot;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-toy
 */
class RobotTest extends TestCase
{
    public function testGetDescription() {
        $robot = new Robot();
        $this->assertInstanceOf(Robot::class, $robot);
        $this->assertEquals("This is a robot!", $robot->getDescription());
    }
}