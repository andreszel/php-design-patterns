<?php

use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use PHPUnit\Framework\TestCase;

class MailTest extends TestCase
{
    /**
     * @test
     * @testdox Should process send notification with Mail correctly
     */
    public function testSend()
    {
        $strategy = new Mail();
        $this->expectOutputString("Notification send from: Mail");
        $strategy->send();
    }
}