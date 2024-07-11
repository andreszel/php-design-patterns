<?php

namespace App\DesignPatterns\Structural\Adapter\Example2;

interface NewFileWriter
{
    public function write($data): bool;
}