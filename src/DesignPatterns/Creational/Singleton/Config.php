<?php

namespace App\DesignPatterns\Creational\Singleton;

final class Config extends Singleton
{
    private $values = [];

    public function setValue(string $key, string $value)
    {
        $this->values[$key] = $value;
    }

    public function getValue(string $key, string $default = null): string
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }

        return $default;
    }

    public function getAll(): array
    {
        return $this->values;
    }
}