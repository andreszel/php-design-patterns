<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class User
{
    public function login() {
        echo "-> Login to system!\n";
    }

    public function register() {
        echo "-> Register account.\n";
    }
}