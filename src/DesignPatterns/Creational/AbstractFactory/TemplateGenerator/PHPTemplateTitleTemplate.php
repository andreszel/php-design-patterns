<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

/**
 * And this Concrete Product provides PHPTemplate page title templates.
 */
class PHPTemplateTitleTemplate implements ITitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1><?= \$title; ?></h1>";
    }
}