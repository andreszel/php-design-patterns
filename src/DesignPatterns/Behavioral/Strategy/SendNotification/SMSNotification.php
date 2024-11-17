<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class SMSNotification extends Notification
{
    public function notify()
    {
        echo "Notification send from: SMSNotification! ";
        parent::notify();
    }
}