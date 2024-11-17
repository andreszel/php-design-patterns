<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\MailNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group strategy-with-template-method-mail-notification
 * @testdox [SendNotification] MailNotification: Integration Test
 */
class MailNotificationTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and FCM strategy correctly
     */
    public function testSendNotificationWithMailNotificationAndFCM() {
        $strategy = new FCM();
        $FCMNotifitcation = new MailNotification($strategy);
        $this->expectOutputString('Notification send from: MailNotification! Notification send from: FCM');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and SMS strategy correctly
     */
    public function testSendNotificationWithMailNotificationAndSMS() {
        $strategy = new SMS();
        $FCMNotifitcation = new MailNotification($strategy);
        $this->expectOutputString('Notification send from: MailNotification! Notification send from: SMS');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and Mail strategy correctly
     */
    public function testSendNotificationWithMailNotificationAndMail() {
        $strategy = new Mail();
        $FCMNotifitcation = new MailNotification($strategy);
        $this->expectOutputString('Notification send from: MailNotification! Notification send from: Mail');
        $FCMNotifitcation->notify();
    }
}