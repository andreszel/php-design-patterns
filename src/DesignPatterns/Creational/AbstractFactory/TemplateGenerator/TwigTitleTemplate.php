<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

class TwigTitleTemplate implements ITitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1>{{ title }}</h1>";
    }
}