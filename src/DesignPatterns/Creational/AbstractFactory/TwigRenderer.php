<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class TwigRenderer implements TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        return \Twig::render($templateString, $arguments);
    }
}