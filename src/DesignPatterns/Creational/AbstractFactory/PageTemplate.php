<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

interface PageTemplate
{
    public function getTemplateString(): string;
}