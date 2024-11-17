<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class Notification
{
    public SendableI $sendableStrategy;

    public function __construct(SendableI $sendableStrategy)
    {
        $this->sendableStrategy = $sendableStrategy;
    }

    public function setStrategy(SendableI $sendableStrategy): self
    {
        $this->sendableStrategy = $sendableStrategy;
        return $this;
    }

    public function notify()
    {
        return $this->sendableStrategy->send();
    }
}