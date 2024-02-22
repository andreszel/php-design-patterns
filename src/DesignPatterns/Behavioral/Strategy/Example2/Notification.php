<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example2;

class Notification
{
    public Sendable $sendable;

    public function setSendable(Sendable $sendable): self
    {
        $this->sendable = $sendable;
        return $this;
    }

    public function notify()
    {
        return $this->sendable->send();
    }
}