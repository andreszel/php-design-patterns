<?php

namespace App\DesignPatterns\Structural\Facade\Example1;

class Cart
{
    public function getItems() {
        echo "-> Your items in cart!\n";
    }
}