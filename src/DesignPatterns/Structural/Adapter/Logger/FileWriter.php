<?php

namespace App\DesignPatterns\Structural\Adapter\Logger;

interface FileWriter
{
    public function writeToFile($data): bool;
}