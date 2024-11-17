<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

final class SMS implements SendableI
{
    public function send(): void
    {
        echo "Notification send from: SMS";
    }
}