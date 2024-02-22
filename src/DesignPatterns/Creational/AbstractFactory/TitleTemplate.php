<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

interface TitleTemplate
{
    public function getTemplateString(): string;
}