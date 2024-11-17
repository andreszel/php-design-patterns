<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use PHPUnit\Framework\TestCase;

class FCMTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with FCM correctly
     */
    public function testSend()
    {
        $strategy = new FCM();
        $this->expectOutputString("Notification send from: FCM");
        $strategy->send();
    }
}