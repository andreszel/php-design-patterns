<?php

namespace App\DesignPatterns\Structural\Adapter\Logger;

interface NewFileWriter
{
    public function write($data): bool;
}