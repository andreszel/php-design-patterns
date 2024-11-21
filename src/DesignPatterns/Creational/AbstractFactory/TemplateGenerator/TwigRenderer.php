<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

class TwigRenderer implements ITemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        return \Twig::render($templateString, $arguments);
    }
}