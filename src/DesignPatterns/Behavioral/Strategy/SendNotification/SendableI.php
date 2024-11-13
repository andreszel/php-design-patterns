<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

interface SendableI
{
    public function send(): void;
}