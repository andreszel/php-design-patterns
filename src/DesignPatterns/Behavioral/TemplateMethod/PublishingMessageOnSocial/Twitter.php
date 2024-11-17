<?php

namespace App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

class Twitter extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "Checking user's credentials.... Name: " . $this->username . ", Password: " . str_repeat("*", strlen($this->password)). ". ";

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
}