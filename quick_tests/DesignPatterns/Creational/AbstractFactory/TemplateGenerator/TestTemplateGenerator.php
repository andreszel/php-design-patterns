<?php

namespace App\QuickTests\DesignPatterns\Creational\AbstractFactory\TemplateGenerator;

use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\Page;
use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\PHPTemplateFactory;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestTemplateGenerator
{
    public static function run(): void
    {
        $page = new Page('Simple page title', 'This is the body page');
        echo $page->render(new PHPTemplateFactory());

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}