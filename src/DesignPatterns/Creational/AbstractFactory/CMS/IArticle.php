<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

interface IArticle {
    public function getContent(): string;
    public function render(): string;
}