<?php

namespace App\QuickTests\DesignPatterns\Creational\Singleton;

use App\DesignPatterns\Creational\Singleton\Config;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestConfig
{
    public static function run(): void
    {
        $config1 = Config::getInstance();
        $config1->setValue('host', 'localhost');
        $config1->setValue('port', '3306');
        $host = $config1->getValue('host');
        $port = $config1->getValue('port');

        $config2 = Config::getInstance();
        $config2->setValue('user', 'user');
        $config2->setValue('password', 'secret');

        if($host == $config2->getValue('host') && $port == $config2->getValue('port')) {
            Logger::log("- Wartości host i port są jednakowe w obydwu instancjach klasy Config!");
        }

        if ($config1 === $config2) {
            Logger::log("- Tak!. Klasa Config ma jedną instancję!");
        } else {
            Logger::log("- Nie!. Klasa Config ma różne instancje!");
        }

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}