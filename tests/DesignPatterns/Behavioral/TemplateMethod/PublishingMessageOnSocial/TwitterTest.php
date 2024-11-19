<?php

use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Twitter;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group template-method-publishing-message-on-social
 */
class TwitterTest extends TestCase
{
    public function testLoginToTwitterSocialAccount()
    {
        $twitter = new Twitter('user', 'password');
        $this->expectOutputString("Checking user's credentials.... Name: user, Password: " . str_repeat("*", strlen('password')). ". ***** Twitter: 'user' has logged in successfully. ");
        $result = $twitter->logIn("user", "password");
        $this->assertTrue($result, "The logIn method should return true.");
    }

    public function testSendDataMessageToTwitterSocialAccount()
    {
        $twitter = new Twitter("user", "password");
        $this->expectOutputString("Twitter: 'user' has posted 'Hello, world!'. ");
        $result = $twitter->sendData("Hello, world!");
        $this->assertTrue($result, "The sendData method should return true");
    }

    public function testLogOutFromTwitterSocialAccount()
    {
        $twitter = new Twitter("user", "password");
        $this->expectOutputString("Twitter: 'user' has been logged out.");
        $result = $twitter->logOut();
        $this->assertNull($result);
    }
}