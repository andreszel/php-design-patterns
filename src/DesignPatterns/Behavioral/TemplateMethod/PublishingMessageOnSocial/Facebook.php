<?php

namespace App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

class Facebook extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nChecking user's creentials...\n";
        echo "Name: " . $this->username . "\n";
        echo "Password: " . str_repeat("*", strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nFacebook: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Facebook: '" . $this->username . "' has posted '" . $message . "'.\n ";

        return true;
    }

    public function logOut(): void
    {
        echo "Facebook: '" . $this->username . "' has been logged out.\n";
    }
}