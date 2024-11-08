<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class SMS implements Sendable
{
    public function send(): void
    {
        echo "Notification send from: SMS\n";
    }
}