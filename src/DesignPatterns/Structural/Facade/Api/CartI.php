<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface CartI
{
    public function addProduct(ProductI $product, int $quantity): void;
    public function removeProduct(int $id): void;
    public function getItems(): array;
    public function getUser(): UserI;
}