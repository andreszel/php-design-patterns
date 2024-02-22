<?php

namespace App\DesignPatterns\Behavioral\Strategy\Example2;

class SMS implements Sendable
{
    public function send(): void
    {
        echo "Notification send from: SMS\n";
    }
}