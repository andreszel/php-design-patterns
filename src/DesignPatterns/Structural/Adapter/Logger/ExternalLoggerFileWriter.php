<?php

namespace App\DesignPatterns\Structural\Adapter\Logger;

class ExternalLoggerFileWriter implements NewFileWriter
{
    public function write($data): bool
    {
        echo 'Success write()!';

        return true;
    }
}