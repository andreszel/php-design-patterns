<?php

use App\DesignPatterns\Creational\Factory\Toy\Doll;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-toy
 */
class DollTest extends TestCase
{
    public function testDescription() {
        $doll = new Doll();
        $this->assertInstanceOf(Doll::class, $doll);
        $this->assertEquals("This is a doll!", $doll->getDescription());
    }
}