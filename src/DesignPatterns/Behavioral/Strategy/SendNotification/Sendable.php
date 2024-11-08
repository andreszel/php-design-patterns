<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

interface Sendable
{
    public function send(): void;
}