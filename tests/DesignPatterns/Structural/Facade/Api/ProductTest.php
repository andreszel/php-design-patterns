<?php

use App\DesignPatterns\Structural\Facade\Api\Product;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group structural-facade-api
 */
class ProductTest extends TestCase
{
    public function testGetProduct()
    {
        $product = new Product(1, 'Product 1', 10.0, 5);
        $this->assertEquals(1, $product->getId());
        $this->assertEquals('Product 1', $product->getName());
        $this->assertEquals(10.0, $product->getPrice());
        $this->assertEquals(5, $product->getStock());
    }
}
