<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class BladeTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new BladeTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new BladePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new BladeRenderer();
    }
}