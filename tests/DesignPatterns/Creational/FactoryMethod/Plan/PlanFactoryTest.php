<?php

use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFactory;
use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFree;
use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanPro;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-method-plan
 */
class PlanFactoryTest extends TestCase
{
    public function testCreateFreePlan()
    {
        $factory = new PlanFactory();
        $plan = $factory->createPlan('free');

        $this->assertInstanceOf(PlanFree::class, $plan);
    }

    public function testCreateProPlan()
    {
        $factory = new PlanFactory();
        $plan = $factory->createPlan('pro');

        $this->assertInstanceOf(PlanPro::class, $plan);
    }

    public function testCreateUnknownPlan()
    {
        $this->expectException(\Exception::class);
        $factory = new PlanFactory();
        $factory->createPlan('unknown');
    }
}