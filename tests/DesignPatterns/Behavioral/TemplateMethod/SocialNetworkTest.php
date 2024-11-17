<?php

use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Facebook;
use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\SocialNetwork;
use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Twitter;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group template-method-publishing-message-on-social
 */
class SocialNetworkTest extends TestCase
{
    public function testFacebookPost()
    {
        $facebook = new Facebook('user', 'password');
        $message = "Hello, Facebook!";
        $this->expectOutputString("Checking user's credentials.... Name: user, Password: " . str_repeat("*", strlen('password')) . ". .....Facebook: 'user' has logged in successfully. Facebook: 'user' has posted 'Hello, Facebook!'. Facebook: 'user' has been logged out.");
        $result = $facebook->post($message);
        $this->assertTrue($result, 'The post method should return true.');
    }

    public function testTwitterPost()
    {
        $twitter = new Twitter('user', 'password');
        $message = "Hello, Twitter!";
        $this->expectOutputString("Checking user's credentials.... Name: user, Password: " . str_repeat("*", strlen('password')) . ". .....Twitter: 'user' has logged in successfully. Twitter: 'user' has posted 'Hello, Twitter!'. Twitter: 'user' has been logged out.");
        $result = $twitter->post($message);
        $this->assertTrue($result, 'The post method should return true.');
    }

    public function testFailedLogin()
    {
        $socialNetwork = $this->getMockBuilder(SocialNetwork::class)
            ->setConstructorArgs(['user', 'wrong-pass'])
            ->onlyMethods(['logIn', 'sendData', 'logOut'])
            ->getMockForAbstractClass();

        $socialNetwork->method('logIn')->willReturn(false);
        $socialNetwork->method('sendData')->willReturn(true);
        $socialNetwork->method('logOut')->willReturnCallback(function() {});

        $result = $socialNetwork->post("Hello, world!");
        $this->assertFalse($result, "The post method should return false on failed login.");
    }
}