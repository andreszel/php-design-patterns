<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMSNotification;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group strategy-with-template-method-sms-notification
 * @testdox [SendNotification] SMSNotification: Integration Test
 */
class SMSNotificationTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and FCM strategy correctly
     */
    public function testSendNotificationWithSMSNotificationAndFCM() {
        $strategy = new FCM();
        $FCMNotifitcation = new SMSNotification($strategy);
        $this->expectOutputString('Notification send from: SMSNotification! Notification send from: FCM');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and SMS strategy correctly
     */
    public function testSendNotificationWithSMSNotificationAndSMS() {
        $strategy = new SMS();
        $FCMNotifitcation = new SMSNotification($strategy);
        $this->expectOutputString('Notification send from: SMSNotification! Notification send from: SMS');
        $FCMNotifitcation->notify();
    }

    /**
     * @test
     * @testdox Should process send notification with Template Method: FCM Notification and Mail strategy correctly
     */
    public function testSendNotificationWithSMSNotificationAndMail() {
        $strategy = new Mail();
        $FCMNotifitcation = new SMSNotification($strategy);
        $this->expectOutputString('Notification send from: SMSNotification! Notification send from: Mail');
        $FCMNotifitcation->notify();
    }
}