<?php

use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\PHPTemplateFactory;
use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\PHPTemplateTitleTemplate;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-abstract-factory-Template-Generator
 */
class PHPTemplateFactoryTest extends TestCase
{
    protected PHPTemplateFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new PHPTemplateFactory();
    }

    public function testCreateTitleTemplate() {
        $template = $this->factory->createTitleTemplate();
        $this->assertInstanceOf(PHPTemplateTitleTemplate::class, $template);
        $this->assertStringContainsString('<h1><?= $title; ?></h1>', $template->getTemplateString());
    }
}