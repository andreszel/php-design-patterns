<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class FCM implements Sendable
{
    public function send(): void
    {
        echo "Notification send from: FCM\n";
    }
}