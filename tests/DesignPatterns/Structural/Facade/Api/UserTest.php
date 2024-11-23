<?php

use App\DesignPatterns\Structural\Facade\Api\User;
use PHPUnit\Framework\TestCase;

/**
 * @test
 * @group structural-facade-api
 */
class UserTest extends TestCase
{
    public function testLogin()
    {
        $user = new User('testuser', 'test@example.com');
        $this->assertEquals(['status' => 'success', 'message' => 'Login to system!'], $user->login());
    }

    public function testRegister()
    {
        $user = new User('testuser', 'test@example.com');
        $this->assertEquals(['status' => 'success', 'message' => 'Register account.'], $user->register());
    }
}
