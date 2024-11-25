<?php

namespace App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

use App\Helper\ConsoleHelper;
use App\Helper\ConsoleHelperI;

final class Twitter extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        $text = "Checking user's credentials.... Name: " . $this->username . ", Password: " . str_repeat("*", strlen($this->password)). ". ";

        $this->showTextOneLetterAtTime($text, new ConsoleHelper());

        NetworkUtils::simulateNetworkLatency();

        echo "Twitter: '" . $this->username . "' has logged in successfully. ";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Twitter: '" . $this->username . "' has posted '" . $message . "'. ";

        return true;
    }

    public function logOut(): void
    {
        echo "Twitter: '" . $this->username . "' has been logged out.";
    }

    private function showTextOneLetterAtTime(string $text, ConsoleHelperI $consoleHelper)
    {
        $consoleHelper->showStringOneLetterAtTime($text);
    }
}