<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface ApiI
{
    public function login(): array;
    public function register(): array;
    public function addToCart(int $productId, int $quantity): void;
    public function removeFromCart(int $productId): void;
    public function getCartItems(): array;
    public function getProducts(): array;
    public function getProduct(int $id): ProductI;
}