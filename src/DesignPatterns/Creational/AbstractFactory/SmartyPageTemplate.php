<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

class SmartyPageTemplate extends BasePageTemplate
{
    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();

        return <<<HTML
        <div class="container">
            $renderedTitle
            <article class="content">{{ content }}</article>
        </div>
        HTML;
    }
}