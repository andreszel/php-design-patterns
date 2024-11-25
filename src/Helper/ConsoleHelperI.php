<?php

namespace App\Helper;

interface ConsoleHelperI
{
    public function printConsole(string $message, string $test): void;
    public function showStringOneLetterAtTime(string $text): void;
}