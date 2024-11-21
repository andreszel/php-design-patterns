<?php

namespace App\DesignPatterns\Creational\AbstractFactory\CMS;

use InvalidArgumentException;

class CMS
{
    protected $factory;

    public function __construct(IArticleFactory $factory)
    {
        $this->factory = $factory;
    }

    public function renderArticle(string $type, string $title, string $content): string
    {
        switch($type) {
            case 'text':
                $article = $this->factory->createTextArticle($title, $content);
                break;
            case 'image':
                $article = $this->factory->createImageArticle($title, $content);
                break;
            case 'video':
                $article = $this->factory->createVideoArticle($title, $content);
                break;
            default:
                throw new InvalidArgumentException("Unknown article type: $type");
        }

        return $article->render();
    }
}