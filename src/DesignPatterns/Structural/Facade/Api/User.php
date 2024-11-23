<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class User implements UserI
{
    private string $username;
    private string $email;

    public function __construct(string $username, string $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function login(): array {
        return ['status' => 'success', 'message' => 'Login to system!'];
    }

    public function register(): array {
        return ['status' => 'success', 'message' => 'Register account.'];
    }
}