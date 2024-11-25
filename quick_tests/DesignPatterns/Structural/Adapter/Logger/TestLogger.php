<?php

namespace App\QuickTests\DesignPatterns\Structural\Adapter\Logger;

use App\DesignPatterns\Creational\Singleton\Logger;
use App\DesignPatterns\Structural\Adapter\Logger\ExternalLoggerFileWriter;
use App\DesignPatterns\Structural\Adapter\Logger\ExternalLoggerFileWriterAdapter;
use App\DesignPatterns\Structural\Adapter\Logger\RandomProcessor;
use App\Helper\ConstHelper;

class TestLogger
{
    public static function run(): void
    {
        $randomProcessor = new RandomProcessor(new ExternalLoggerFileWriterAdapter(new ExternalLoggerFileWriter()));
        $randomProcessor->process(['test','test']);

        // internal class
        //$randomProcessor = new RandomProcessor(new LoggerFileWriter());
        //$randomProcessor->process(['test','test']);

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}