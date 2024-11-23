<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface ProductStorageI
{
    public function getAll(): array;
    public function get(int $id): ProductI;
    public function addProduct(ProductI $product): void;
    public function removeProduct(int $id): void;
}