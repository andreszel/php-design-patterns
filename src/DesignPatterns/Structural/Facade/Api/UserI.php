<?php

namespace App\DesignPatterns\Structural\Facade\Api;

interface UserI
{
    public function getUsername(): string;
    public function getEmail(): string;
    public function login(): array;
    public function register(): array;
}