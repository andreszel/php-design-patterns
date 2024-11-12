<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class Cart
{
    public function getItems() {
        echo "-> Your items in cart!\n";
    }
}