<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

class TextArticle implements IArticle
{
    protected $title;
    protected $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function render(): string
    {
        return "<h1>{$this->title}</h1><p>{$this->content}</p>";
    }
}