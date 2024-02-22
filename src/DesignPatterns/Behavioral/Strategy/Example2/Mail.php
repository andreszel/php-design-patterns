<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example2;

class Mail implements Sendable
{
    public function send(): void
    {
        echo "Notification send from: Mail\n";
    }
}