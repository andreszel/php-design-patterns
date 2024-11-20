<?php

use App\DesignPatterns\Creational\Builder\SQLQuery\MysqlQueryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group creational-builder-sql-query
 */
class MysqlQueryBuilderTest extends TestCase
{
    public function testSelect()
    {
        $builder = new MysqlQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])->getSql();
        $this->assertEquals("SELECT id, name FROM users;", $query);
    }

    public function testWhere()
    {
        $builder = new MysqlQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->where('id', '1')
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users WHERE id = '1';", $query);
    }

    public function testLimit()
    {
        $builder = new MysqlQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->limit(0, 10)
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users LIMIT 0, 10;", $query);
    }

    public function testWhereAndLimit()
    {
        $builder = new MysqlQueryBuilder();
        $query = $builder->select('users', ['id', 'name'])
            ->where('name', 'John')
            ->limit(0, 10)
            ->getSql();
        $this->assertEquals("SELECT id, name FROM users WHERE name = 'John' LIMIT 0, 10;", $query);
    }

    public function testInvalidWhereUsage()
    {
        $this->expectException(\Exception::class);
        $builder = new MysqlQueryBuilder();
        $builder->where('name', 'John');
    }

    public function testInvalidLimitUsage()
    {
        $this->expectException(\Exception::class);
        $builder = new MysqlQueryBuilder();
        $builder->limit(0, 10);
    }
}