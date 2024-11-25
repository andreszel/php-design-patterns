<?php

namespace App\QuickTests\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Facebook;
use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Twitter;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestPublishingMessage
{
    public static function run(): void
    {
        echo "Username: \n";
        $username = readline();
        echo "Password: \n";
        $password = readline();
        echo "Message: \n";
        $message = readline();

        echo "\nChoose the social network to post the message:\n" .
            "1 - Facebook\n" .
            "2 - Twitter\n";
        echo "Wybieram: ";
        $choice = readline();
        echo "\n";

        // Now, let's create a proper social network object and send the message.
        if ($choice == 1) {
            $network = new Facebook($username, $password);
        } elseif ($choice == 2) {
            $network = new Twitter($username, $password);
        } else {
            die("Sorry, I'm not sure what you mean by that.\n");
        }
        $network->post($message);

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}