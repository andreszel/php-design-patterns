<?php

namespace App\DesignPatterns\Structural\Facade\Example1;

class Product
{
    public function getAll() {
        echo "-> Products list.\n";
    }

    public function get(int $id) {
        echo "-> Details product ID: " . $id . "\n";
    }
}