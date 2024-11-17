<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Notification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group strategy-send-notification
 * @testdox [SendNotification] Notification: Integration Test
 */
class NotificationTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with FCM correctly
     */
    public function testSendNotificationWithFCM() {
        $strategy = new FCM();
        $notifitcation = new Notification($strategy);
        $this->expectOutputString('Notification send from: FCM');
        $notifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with SMS correctly
     */
    public function testSendNotificationWithSMS() {
        $strategy = new SMS();
        $notifitcation = new Notification($strategy);
        $this->expectOutputString('Notification send from: SMS');
        $notifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Mail correctly
     */
    public function testSendNotificationWithMail() {
        $strategy = new Mail();
        $notifitcation = new Notification($strategy);
        $this->expectOutputString('Notification send from: Mail');
        $notifitcation->notify();
    }
}