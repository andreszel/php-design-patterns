<?php

namespace App\DesignPatterns\Structural\Adapter\Example2;

class ExternalLoggerFileWriter implements NewFileWriter
{
    public function write($data): bool
    {
        echo 'Success write()!';

        return true;
    }
}