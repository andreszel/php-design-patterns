<?php

namespace App\DesignPatterns\Structural\Adapter\Logger;

class LoggerFileWriter implements FileWriter
{
    public function writeToFile($data): bool
    {
        echo "Success writeToFile()!";

        return true;
    }
}