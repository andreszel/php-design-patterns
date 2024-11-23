<?php

use App\DesignPatterns\Structural\Facade\Api\Cart;
use App\DesignPatterns\Structural\Facade\Api\Product;
use App\DesignPatterns\Structural\Facade\Api\User;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group structural-facade-api
 */
class CartTest extends TestCase
{
    public function testAddProduct()
    {
        $user = new User('testuser', 'test@example.com');
        $cart = new Cart($user);
        $product = new Product(1, 'Product 1', 10.0, 5);

        $cart->addProduct($product, 3);
        $items = $cart->getItems();

        $this->assertCount(1, $items);
        $this->assertEquals(3, $items[1]->getQuantity());
    }

    public function testRemoveProduct()
    {
        $user = new User('testuser', 'test@example.com');
        $cart = new Cart($user);
        $product = new Product(1, 'Product 1', 10.0, 5);

        $cart->addProduct($product, 3);
        $cart->removeProduct(1);
        $items = $cart->getItems();

        $this->assertCount(0, $items);
    }
}
