<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class Mail implements SendableI
{
    public function send(): void
    {
        echo "Notification send from: Mail\n";
    }
}