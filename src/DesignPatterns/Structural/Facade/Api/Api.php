<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class Api implements ApiI
{
    private UserI $user;
    private CartI $cart;
    private ProductStorageI $productStorage;

    public function __construct(UserI $user, CartI $cart, ProductStorageI $productStorage)
    {
        $this->user = $user;
        $this->cart = $cart;
        $this->productStorage = $productStorage;
    }

    public function login(): array {
        return $this->user->login();
    }

    public function register(): array {
        return $this->user->register();
    }

    public function addToCart(int $productId, int $quantity): void
    {
        $product = $this->productStorage->get($productId);
        $this->cart->addProduct($product, $quantity);
    }

    public function removeFromCart(int $productId): void
    {
        $this->cart->removeProduct($productId);
    }

    public function getCartItems(): array {
        return $this->cart->getItems();
    }

    public function getProducts(): array {
        return $this->productStorage->getAll();
    }

    public function getProduct(int $id): ProductI {
        return $this->productStorage->get($id);
    }
}