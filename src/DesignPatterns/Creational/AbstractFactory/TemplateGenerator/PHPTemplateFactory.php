<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

class PHPTemplateFactory implements ITemplateFactory
{
    public function createTitleTemplate(): ITitleTemplate
    {
        return new PHPTemplateTitleTemplate();
    }

    public function createPageTemplate(): IPageTemplate
    {
        return new PHPTemplatePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): ITemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}