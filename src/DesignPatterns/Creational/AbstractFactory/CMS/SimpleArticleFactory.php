<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

class SimpleArticleFactory implements IArticleFactory
{
    public function createTextArticle(string $title, string $content): IArticle
    {
        return new TextArticle($title, $content);
    }

    public function createImageArticle(string $title, string $imagePath): IArticle
    {
        return new ImageArticle($title, $imagePath);
    }

    public function createVideoArticle(string $title, string $videoPath): IArticle
    {
        return new VideoArticle($title, $videoPath);
    }
}