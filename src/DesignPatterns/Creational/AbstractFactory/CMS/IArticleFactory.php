<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

interface IArticleFactory {
    public function createTextArticle(string $title, string $content): IArticle;

    public function createImageArticle(string $title, string $imagePath): IArticle;

    public function createVideoArticle(string $title, string $videoPath): IArticle;
}