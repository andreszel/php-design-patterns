<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface ProductI
{
    public function getId(): int;
    public function getName(): string;
    public function getPrice(): float;
    public function getStock(): int;
    public function setStock(int $stock): void;
}