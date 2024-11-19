<?php

use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Facebook;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group template-method-publishing-message-on-social
 */
class FacebookTest extends TestCase
{
    public function testLoginToFacebookSocialAccount()
    {
        $facebook = new Facebook('user', 'password');
        $this->expectOutputString("Checking user's credentials.... Name: user, Password: " . str_repeat("*", strlen('password')). ". ***** Facebook: 'user' has logged in successfully. ");
        $result = $facebook->logIn("user", "password");
        $this->assertTrue($result, "The logIn method should return true.");
    }

    public function testSendDataMessageToFacebookSocialAccount()
    {
        $facebook = new Facebook("user", "password");
        $this->expectOutputString("Facebook: 'user' has posted 'Hello, world!'. ");
        $result = $facebook->sendData("Hello, world!");
        $this->assertTrue($result, "The sendData method should return true");
    }

    public function testLogOutFromFacebookSocialAccount()
    {
        $facebook = new Facebook("user", "password");
        $this->expectOutputString("Facebook: 'user' has been logged out.");
        $result = $facebook->logOut();
        $this->assertNull($result);
    }
}