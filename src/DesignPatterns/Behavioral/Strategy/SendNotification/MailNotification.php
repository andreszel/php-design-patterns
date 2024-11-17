<?php

namespace App\DesignPatterns\Behavioral\Strategy\SendNotification;

class MailNotification extends Notification
{
    public function notify()
    {
        echo "Notification send from: MailNotification! ";
        parent::notify();
    }
}