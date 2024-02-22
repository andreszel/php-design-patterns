<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Structural\Adapter\Example1;

interface Notification
{
    public function send(string $title, string $message);
}