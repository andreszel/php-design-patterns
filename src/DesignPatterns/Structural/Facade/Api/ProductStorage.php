<?php

namespace App\DesignPatterns\Structural\Facade\Api;

use JsonSerializable;

class ProductStorage implements ProductStorageI, JsonSerializable
{
    private array $products = [];
    private int $nextId = 1;

    public function __construct()
    {
        $this->products = [
            $this->nextId++ => new Product(1, 'Product 1', 10.0, 5),
            $this->nextId++ => new Product(2, 'Product 2', 30.0, 4),
        ];
    }

    public function getAll(): array
    {
        return $this->products;
    }

    public function get(int $id): ProductI
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        throw new \Exception("Product not found!");
    }

    public function addProduct(ProductI $product): void
    {
        if ($product->getId() <= 0) {
            throw new \Exception("Product ID must be frather than 0!");
        }

        if (isset($this->products[$product->getId()])) {
            throw new \Exception("Product ID exists!");
        }

        $productId = $this->nextId++;
        $newProduct = new Product($productId, $product->getName(), $product->getPrice(), $product->getStock());

        $this->products[$productId] = $newProduct;
    }

    public function removeProduct(int $id): void
    {
        unset($this->products[$id]);
    }

    public function jsonSerialize(): mixed
    {
        return [
            'products' => $this->products
        ];
    }
}