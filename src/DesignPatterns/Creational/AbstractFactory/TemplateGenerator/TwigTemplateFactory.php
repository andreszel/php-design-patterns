<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

class TwigTemplateFactory implements ITemplateFactory
{
    public function createTitleTemplate(): ITitleTemplate
    {
        return new TwigTitleTemplate();
    }

    public function createPageTemplate(): IPageTemplate
    {
        return new TwigPageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): ITemplateRenderer
    {
        return new TwigRenderer();
    }
}