<?php

namespace App\QuickTests\DesignPatterns\Structural\Adapter\SlackNotification;

use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestSlackNotification
{
    public static function run(): void
    {
        Logger::log("Test do napisania!");

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}