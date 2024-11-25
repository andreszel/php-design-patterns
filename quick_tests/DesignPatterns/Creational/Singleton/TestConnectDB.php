<?php

namespace App\QuickTests\DesignPatterns\Creational\Singleton;

use App\DesignPatterns\Creational\Singleton\ConnectDB;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestConnectDB
{
    public static function run(): void
    {
        Logger::log(ConstHelper::START_ROW_STRING . 'TEST DESIGN PATTERNS');
        Logger::log(ConstHelper::START_ROW_STRING . 'SINGLETON - Database connection');
        Logger::log("\n");
    
        $instanceA = ConnectDB::getInstance();
        $connectionA = $instanceA->getConnection();
        $instanceB = ConnectDB::getInstance();
        $connectionB = $instanceB->getConnection();
    
        var_dump($connectionA);
        var_dump($connectionB);
    
        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}