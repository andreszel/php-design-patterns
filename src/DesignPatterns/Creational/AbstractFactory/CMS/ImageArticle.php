<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

class ImageArticle implements IArticle
{
    protected $title;
    protected $imagePath;

    public function __construct(string $title, string $imagePath)
    {
        $this->title = $title;
        $this->imagePath = $imagePath;
    }

    public function getContent(): string
    {
        return $this->imagePath;
    }

    public function render(): string
    {
        return "<h1>{$this->title}</h1><img src='{$this->imagePath}' alt='Image article' />";
    }
}