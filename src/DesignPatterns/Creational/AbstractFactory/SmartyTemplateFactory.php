<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class SmartyTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new SmartyTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new SmartyPageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new SmartyRenderer();
    }
}