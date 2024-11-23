<?php

namespace App\DesignPatterns\Structural\Facade\Api;

use JsonSerializable;

class Product implements ProductI, JsonSerializable
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(int $id = 0, string $name = '', float $price = 0.0, int $stock = 1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ];
    }
}