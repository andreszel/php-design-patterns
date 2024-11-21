<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;
/**
 * The page template uses the title sub-template, so we have to provide the way
 * to set it in the sub-template object. The abstract factory will link the page
 * template with a title template of the same variant.
 */
abstract class BasePageTemplate implements IPageTemplate
{
    protected $titleTemplate;

    public function __construct(ITitleTemplate $titleTemplate)
    {
        $this->titleTemplate = $titleTemplate;
    }
}