<?php

namespace App\QuickTests\DesignPatterns\Creational\AbstractFactory\CMS;

use App\DesignPatterns\Creational\AbstractFactory\CMS\CMS;
use App\DesignPatterns\Creational\AbstractFactory\CMS\SimpleArticleFactory;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestCMS
{
    public static function run()
    {
        $articleFactory = new SimpleArticleFactory();
        $cms = new CMS($articleFactory);

        $textArticle = $cms->renderArticle('text', 'Text article title', 'This is a text article.');
        $imageArticle = $cms->renderArticle('image', 'Image article title', '/path/to/image.jpg');
        $videoArticle = $cms->renderArticle('video', 'Video article title', '/path/to/video.mp4');
        echo "Text article: \n\t$textArticle";
        echo "\n\n";
        echo "Image article: \n\t$imageArticle";
        echo "\n\n";
        echo "Video article: \n\t$videoArticle";
        echo "\n";

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}