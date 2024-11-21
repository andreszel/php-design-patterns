<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

class VideoArticle implements IArticle
{
    protected $title;
    protected $videoPath;

    public function __construct(string $title, string $videoPath)
    {
        $this->title = $title;
        $this->videoPath = $videoPath;
    }

    public function getContent(): string
    {
        return $this->videoPath;
    }

    public function render(): string
    {
        return "<h1>{$this->title}</h1><video src='{$this->videoPath}' controls></video>";
    }
}