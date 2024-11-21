<?php

namespace App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

/**
 * Deklarujemy interface fabryki abstrakcyjnej tworząc metody dla każdego odrębnego typu produktu
 */
interface ITemplateFactory
{
    public function createTitleTemplate(): ITitleTemplate;

    public function createPageTemplate(): IPageTemplate;

    public function getRenderer(): ITemplateRenderer;
}