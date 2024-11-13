<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class FCM implements SendableI
{
    public function send(): void
    {
        echo "Notification send from: FCM\n";
    }
}