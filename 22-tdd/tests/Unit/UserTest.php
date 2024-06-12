<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetFirstName()
    {
        $user = new App\Models\User;
        $user->setFirstName('John');
        $this->assertEquals($user->getFirstName(), 'John');
    }

    public function testThatWeCanGetLastName()
    {
        $user = new App\Models\User;
        $user->setLastName('sami');
        $this->assertEquals($user->getLastName(), 'sami');
    }

    public function testThatWeCanGetFullName()
    {
        $user = new App\Models\User;
        $user->setFirstName('John');
        $user->setLastName('sami');
        $this->assertEquals($user->getFullName(), 'John sami');
    }

    public function testThatWeCanGetTrimedFullName()
    {
        $user = new App\Models\User;
        $user->setFirstName('  John  ');
        $user->setLastName('  sami  ');
        $this->assertEquals($user->getFullName(), 'John sami');
    }
}
