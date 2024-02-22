<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class BladeTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1>{{ $title }}</h1>";
    }
}