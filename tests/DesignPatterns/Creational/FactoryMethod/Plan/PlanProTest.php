<?php

use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFree;
use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanPro;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-factory-method-plan
 */
class PlanProTest extends TestCase
{
    public function testGetRate()
    {
        $plan = new PlanPro();
        $this->assertEquals(150, $plan->getRate());
    }

    public function testGetFeatures()
    {
        $plan = new PlanPro();
        $this->assertEquals(['Unlimited emails', 'Unlimited contacts', '24-7 support'], $plan->getFeatures());
    }
}