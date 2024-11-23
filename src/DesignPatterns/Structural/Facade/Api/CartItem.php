<?php

namespace App\DesignPatterns\Structural\Facade\Api;

use JsonSerializable;

class CartItem implements CartItemI, JsonSerializable
{
    private ProductI $product;
    private int $quantity;

    public function __construct(ProductI $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): ProductI
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increase(): void
    {
        $this->quantity++;
    }

    public function decrease(): void
    {
        if ($this->quantity > 0) {
            $this->quantity--;
        }
    }

    public function increaseBy(int $quantity): void
    {
        if ($quantity > 0) {
            $this->quantity += $quantity;
        }
    }

    public function decreaseBy(int $quantity): void
    {
        if ($quantity > 0 && $this->quantity - $quantity >= 0) {
            $this->quantity -= $quantity;
        }
    }

    public function jsonSerialize(): array
    {
        return [
            'product' => $this->product,
            'quantity' => $this->quantity
        ];
    }
}