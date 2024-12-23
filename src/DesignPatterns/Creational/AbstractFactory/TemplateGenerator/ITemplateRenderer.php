<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;
/**
 * The renderer is responsible for converting a template string into the actual
 * HTML code. Each renderer behaves differently and expects its own type of
 * template strings passed to it. Baking templates with the factory let you pass
 * proper types of templates to proper renders.
 */
interface ITemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string;
}