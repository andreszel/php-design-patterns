<?php

namespace App\DesignPatterns\Structural\Adapter\Logger;

class ExternalLoggerFileWriterAdapter implements FileWriter
{
    private NewFileWriter $fileWriter;

    public function __construct(NewFileWriter $fileWriter)
    {
        $this->fileWriter = $fileWriter;
    }

    public function writeToFile($data): bool
    {
        return $this->fileWriter->write($data);
    }
}