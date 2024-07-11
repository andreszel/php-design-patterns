<?php

namespace App\DesignPatterns\Structural\Adapter\Example2;

class LoggerFileWriter implements FileWriter
{
    public function writeToFile($data): bool
    {
        echo "Success writeToFile()!";

        return true;
    }
}