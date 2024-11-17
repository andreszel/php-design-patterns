<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCMNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group strategy-with-template-method-fcm-notification
 * @testdox [SendNotification] FCMNotification: Integration Test
 */
class FCMNotificationTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and FCM strategy correctly
     */
    public function testSendNotificationWithFCMNotificationAndFCM() {
        $strategy = new FCM();
        $FCMNotifitcation = new FCMNotification($strategy);
        $this->expectOutputString('Notification send from: FCMNotification! Notification send from: FCM');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and SMS strategy correctly
     */
    public function testSendNotificationWithFCMNotificationAndSMS() {
        $strategy = new SMS();
        $FCMNotifitcation = new FCMNotification($strategy);
        $this->expectOutputString('Notification send from: FCMNotification! Notification send from: SMS');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and Mail strategy correctly
     */
    public function testSendNotificationWithFCMNotificationAndMail() {
        $strategy = new Mail();
        $FCMNotifitcation = new FCMNotification($strategy);
        $this->expectOutputString('Notification send from: FCMNotification! Notification send from: Mail');
        $FCMNotifitcation->notify();
    }
}