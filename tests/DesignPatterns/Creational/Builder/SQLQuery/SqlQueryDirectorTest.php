<?php

use App\DesignPatterns\Creational\Builder\SQLQuery\MysqlQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\PostgresQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\SqlQueryDirector;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-builder-sql-query
 */
class SqlQueryDirectorTest extends TestCase
{
    public function testClientCodeWithMysqlQueryBuilder()
    {
        $director = new SqlQueryDirector();
        $queryBuilder = new MysqlQueryBuilder();

        $query = $director->clientCode($queryBuilder);

        $this->assertEquals(
            "SELECT name, email, password FROM users WHERE age > '18' AND age < '30' LIMIT 10, 20;",
            $query
        );
    }

    public function testClientCodeWithPostgresQueryBuilder()
    {
        $director = new SqlQueryDirector();
        $queryBuilder = new PostgresQueryBuilder();

        $query = $director->clientCode($queryBuilder);

        $this->assertEquals(
            "SELECT name, email, password FROM users WHERE age > '18' AND age < '30' LIMIT 10 OFFSET 20;",
            $query
        );
    }
}