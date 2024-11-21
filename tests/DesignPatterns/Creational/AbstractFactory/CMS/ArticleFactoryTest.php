<?php

use App\DesignPatterns\Creational\AbstractFactory\CMS\CMS;
use App\DesignPatterns\Creational\AbstractFactory\CMS\ImageArticle;
use App\DesignPatterns\Creational\AbstractFactory\CMS\SimpleArticleFactory;
use App\DesignPatterns\Creational\AbstractFactory\CMS\TextArticle;
use App\DesignPatterns\Creational\AbstractFactory\CMS\VideoArticle;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-abstract-factory-CMS
 */
class ArticleFactoryTest extends TestCase
{
    protected SimpleArticleFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new SimpleArticleFactory();
    }

    public function testCreateTextArticle() {
        $article = $this->factory->createTextArticle('Title text article', 'Content');
        $this->assertInstanceOf(TextArticle::class, $article);
        $this->assertEquals('Content', $article->getContent());
        $this->assertStringContainsString('<h1>Title text article</h1><p>Content</p>', $article->render());
    }

    public function testCreateImageArticle() {
        $article = $this->factory->createImageArticle('Title image article', '/path/to/image.jpg');
        $this->assertInstanceOf(ImageArticle::class, $article);
        $this->assertEquals('/path/to/image.jpg', $article->getContent());
        $this->assertStringContainsString('<h1>Title image article</h1><img src=\'/path/to/image.jpg\' alt=\'Image article\' />', $article->render());
    }

    public function testCreateVideoArticle() {
        $article = $this->factory->createVideoArticle('Title video article', '/path/to/video.mp4');
        $this->assertInstanceOf(VideoArticle::class, $article);
        $this->assertEquals('/path/to/video.mp4', $article->getContent());
        $this->assertStringContainsString('<h1>Title video article</h1><video src=\'/path/to/video.mp4\' controls></video>', $article->render());
    }

    public function testCmsRenderArticle() {
        $cms = new CMS($this->factory);

        $output = $cms->renderArticle('text', 'Title text article', 'This is a text article');
        $this->assertStringContainsString('<h1>Title text article</h1><p>This is a text article</p>', $output);

        $output = $cms->renderArticle('image', 'Title image article', '/path/to/image.jpg');
        $this->assertStringContainsString('<h1>Title image article</h1><img src=\'/path/to/image.jpg\' alt=\'Image article\' />', $output);

        $output = $cms->renderArticle('video', 'Title video article', '/path/to/video.mp4');
        $this->assertStringContainsString('<h1>Title video article</h1><video src=\'/path/to/video.mp4\' controls></video>', $output);
    }

    public function testRenderUnknownArticleType() {
        $this->expectException(InvalidArgumentException::class);

        $cms = new CMS($this->factory);
        $cms->renderArticle('unknown', 'Unknown title', 'Unknown content');
    }
}