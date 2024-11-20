<?php

use App\DesignPatterns\Creational\Builder\SQLQuery\PostgresQueryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-builder-sql-query
 */
class PostgresQueryBuilderTest extends TestCase
{
    public function testSelect()
    {
        $builder = new PostgresQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])->getSql();
        $this->assertEquals("SELECT id, name FROM users;", $query);
    }

    public function testWhere()
    {
        $builder = new PostgresQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->where('id', '1')
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users WHERE id = '1';", $query);
    }

    public function testLimit()
    {
        $builder = new PostgresQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->limit(0, 10)
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users LIMIT 0 OFFSET 10;", $query);
    }

    public function testWhereAndLimit()
    {
        $builder = new PostgresQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->where('name', 'John')
            ->limit(0, 10)
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users WHERE name = 'John' LIMIT 0 OFFSET 10;", $query);
    }

    public function testInvalidWhereUsage()
    {
        $this->expectException(\Exception::class);
        $builder = new PostgresQueryBuilder();
        $builder->where('name', 'John');
    }

    public function testInvalidLimitUsage()
    {
        $this->expectException(\Exception::class);
        $builder = new PostgresQueryBuilder();
        $builder->limit(0, 10);
    }
}