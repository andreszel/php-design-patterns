<?php

namespace App\DesignPatterns\Structural\Adapter\Example2;

interface FileWriter
{
    public function writeToFile($data): bool;
}