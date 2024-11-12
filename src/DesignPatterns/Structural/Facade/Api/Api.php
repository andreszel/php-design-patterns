<?php

namespace App\DesignPatterns\Structural\Facade\Api;

class Api
{
    private $user;
    private $cart;
    private $product;

    public function __construct()
    {
        $this->user = new User();
        $this->cart = new Cart();
        $this->product = new Product();
    }

    public function login() {
        $this->user->login();
    }

    public function register() {
        $this->user->register();
    }

    public function getBuyProducts() {
        $this->cart->getItems();
    }

    public function getProducts() {
        $this->product->getAll();
    }

    public function getProduct(int $id) {
        $this->product->get($id);
    }
}