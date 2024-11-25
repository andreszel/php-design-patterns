<?php

namespace App\QuickTests\DesignPatterns\Behavioral\Strategy\SendNotification;

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCMNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\MailNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMSNotification;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestSendNotification
{
    public static function run(): void
    {
        $email = new Mail();
        $fcm = new FCM();
        $sms = new SMS();
        $verificationEmail = new MailNotification($email);
        $verificationEmail->setStrategy($email)->notify();
        Logger::log("");
        $anouncementFCM = new FCMNotification($email);
        $anouncementFCM->setStrategy($fcm)->notify();
        Logger::log("");
        $otpSMS = new SMSNotification($email);
        $otpSMS->setStrategy($sms)->notify();

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}