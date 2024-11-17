<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

final class Mail implements SendableI
{
    public function send(): void
    {
        echo "Notification send from: Mail";
    }
}