<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class BladeRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        return Blade::render($templateString, $arguments);
    }
}