<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

final class FCM implements SendableI
{
    public function send(): void
    {
        echo "Notification send from: FCM\n";
    }
}