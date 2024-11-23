<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface CartItemI
{
    public function getProduct(): ProductI;
    public function getQuantity(): int;
    public function setQuantity(int $quantity): void;
    public function increase(): void;
    public function decrease(): void;
    public function increaseBy(int $quantity): void;
    public function decreaseBy(int $quantity): void;
}