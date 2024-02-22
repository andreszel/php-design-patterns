<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example2;

class FCM implements Sendable
{
    public function send(): void
    {
        echo "Notification send from: FCM\n";
    }
}