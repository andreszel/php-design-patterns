<?php

namespace App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

abstract class SocialNetwork
{
    protected $username;

    protected $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function post(string $message): bool
    {
        if ($this->logIn($this->username, $this->password)) {
            $result = $this->sendData($message);

            $this->logOut();

            return $result;
        }
    }

    abstract public function logIn(string $userName, string $password): bool;

    abstract public function sendData(string $message): bool;

    abstract public function logOut(): void;
}