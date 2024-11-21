<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

interface ITitleTemplate
{
    public function getTemplateString(): string;
}