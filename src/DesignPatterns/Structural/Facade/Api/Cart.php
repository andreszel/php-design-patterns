<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class Cart implements CartI
{
    private UserI $user;
    private array $items = [];

    public function __construct(UserI $user)
    {
        $this->user = $user;
    }

    public function addProduct(ProductI $product, int $quantity): void
    {
        if (isset($this->items[$product->getId()])) {
            $existingItem = $this->items[$product->getId()];
            $existingItem->increaseBy($quantity);
        } else {
            $this->items[$product->getId()] = new CartItem($product, $quantity);
        }
    }

    public function removeProduct(int $id): void
    {
        unset($this->items[$id]);
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getUser(): UserI
    {
        return $this->user;
    }
}