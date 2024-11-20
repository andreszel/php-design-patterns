<?php

use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFree;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-method-plan
 */
class PlanFreeTest extends TestCase
{
    public function testGetRate()
    {
        $plan = new PlanFree();
        $this->assertEquals(0, $plan->getRate());
    }

    public function testGetFeatures()
    {
        $plan = new PlanFree();
        $this->assertEquals(['50 emails', '50 contacts', 'No support. Ever. Bye.'], $plan->getFeatures());
    }
}