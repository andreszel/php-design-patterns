<?php

declare(strict_types=1);

use App\DesignPatterns\Creational\Singleton\ConnectDB;
use PHPUnit\Framework\TestCase;

final class ConnectDBTest extends TestCase
{
    public function testIfOnlyOneInstanceExists(): void
    {
        $instanceA = ConnectDB::getInstance();
        $instanceB = ConnectDB::getInstance();

        $this->assertEquals($instanceA, $instanceB);
    }

    public function testCannotCloneConnectDB(): void
    {
        $connectDB = ConnectDB::getInstance();

        $this->expectException(\Error::class);

        clone $connectDB;
    }

    public function testCannotDeserializeConnectDB(): void
    {
        $connectDB = ConnectDB::getInstance();

        $this->expectException(Exception::class);

        unserialize(serialize($connectDB));
    }
}