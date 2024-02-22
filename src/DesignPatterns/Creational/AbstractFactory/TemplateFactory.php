<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Deklarujemy interface fabryki abstrakcyjnej tworząc metody dka każdego odrębnego typu produktu
 */
interface TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate;

    public function createPageTemplate(): PageTemplate;

    public function getRenderer(): TemplateRenderer;
}