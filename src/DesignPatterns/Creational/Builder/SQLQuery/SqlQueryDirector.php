<?php

namespace App\DesignPatterns\Creational\Builder\SQLQuery;

class SqlQueryDirector
{
    public function clientCode(SqlQueryBuilder $queryBuilder): string
    {
        // ... before code

        $query = $queryBuilder
            ->select("users", ["name", "email", "password"])
            ->where("age", 18, ">")
            ->where("age", 30, "<")
            ->limit(10, 20)
            ->getSql();
        return $query;
    }
}