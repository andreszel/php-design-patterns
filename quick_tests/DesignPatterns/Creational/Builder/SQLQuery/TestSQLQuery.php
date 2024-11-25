<?php

namespace App\QuickTests\DesignPatterns\Creational\Builder\SQLQuery;

use App\DesignPatterns\Creational\Builder\SQLQuery\MysqlQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\PostgresQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\SqlQueryDirector;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestSQLQuery
{
    public static function run(): void
    {
        $sqlQueryFactory = new SqlQueryDirector();
        $queryFromMysql = $sqlQueryFactory->clientCode(new MysqlQueryBuilder());
        $queryFromPostgres = $sqlQueryFactory->clientCode(new PostgresQueryBuilder());

        echo "Query from MySQL:\n";
        echo $queryFromMysql;
        echo "\n\n";
        echo "Query from Postgres:\n";
        echo $queryFromPostgres;
        echo "\n\n";

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}