<?php

namespace App\DesignPatterns\Creational\Builder\SQLQuery;

interface SqlQueryBuilder
{
    public function select(string $table, array $fields): SqlQueryBuilder;

    public function where(string $field, string $value, string $operator = '='): SqlQueryBuilder;

    public function limit(int $start, int $offset): SqlQueryBuilder;

    public function getSql(): string;
}