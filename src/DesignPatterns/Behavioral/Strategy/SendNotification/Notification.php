<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class Notification
{
    public SendableI $sendable;

    public function setSendable(SendableI $sendable): self
    {
        $this->sendable = $sendable;
        return $this;
    }

    public function notify()
    {
        return $this->sendable->send();
    }
}