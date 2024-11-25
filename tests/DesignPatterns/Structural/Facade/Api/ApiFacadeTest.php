<?php

use App\DesignPatterns\Structural\Facade\Api\ApiFacade;
use App\DesignPatterns\Structural\Facade\Api\CartI;
use App\DesignPatterns\Structural\Facade\Api\Product;
use App\DesignPatterns\Structural\Facade\Api\ProductStorageI;
use App\DesignPatterns\Structural\Facade\Api\UserI;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group structural-facade-api
 */
class ApiFacadeTest extends TestCase
{
    public function testLogin()
    {
        $user = $this->createMock(UserI::class);
        $user->method('login')->willReturn(['status' => 'success', 'message' => 'Login to system!']);

        $cart = $this->createMock(CartI::class);
        $productStorage = $this->createMock(ProductStorageI::class);

        $api = new ApiFacade($user, $cart, $productStorage);
        $this->assertEquals(['status' => 'success', 'message' => 'Login to system!'], $api->login());
    }

    public function testAddToCart()
    {
        $user = $this->createMock(UserI::class);
        $cart = $this->createMock(CartI::class);
        $productStorage = $this->createMock(ProductStorageI::class);

        $product = new Product(1, 'Product 1', 10.0, 5);
        $productStorage->method('get')->willReturn($product);

        $api = new ApiFacade($user, $cart, $productStorage);
        $cart->expects($this->once())->method('addProduct')->with($product, 2);

        $api->addToCart(1, 2);
    }
}
