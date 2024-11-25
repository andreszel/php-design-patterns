<?php

namespace App\Helper;

class ConsoleHelper implements ConsoleHelperI
{
    public function printConsole(string $message, string $test): void
    {
        # code...
    }

    public function showStringOneLetterAtTime(string $text): void
    {
        for($i = 0; $i < strlen($text); $i++) {
            echo substr($text, $i, 1);
            $this->msleep(.1);
        }
    }

    private function msleep($time): void
    {
        usleep($time * 1000000);
    }
}