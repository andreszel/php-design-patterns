<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class FCMNotification extends Notification
{
    public function notify()
    {
        echo "Notification send from: FCMNotification! ";
        parent::notify();
    }
}