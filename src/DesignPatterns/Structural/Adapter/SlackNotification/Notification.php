<?php

declare(strict_types=1);

namespace DesignPatterns\Tutorial\Structural\Adapter\SlackNotification;

interface Notification
{
    public function send(string $title, string $message);
}