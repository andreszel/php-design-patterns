<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use PHPUnit\Framework\TestCase;

class SMSTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with SMS correctly
     */
    public function testSend()
    {
        $strategy = new SMS();
        $this->expectOutputString("Notification send from: SMS");
        $strategy->send();
    }
}