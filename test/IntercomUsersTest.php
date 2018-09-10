<?php

namespace Intercom\Test;

use Intercom\IntercomUsers;
use PHPUnit_Framework_TestCase;

class IntercomUsersTest extends PHPUnit_Framework_TestCase
{
    public function testUserCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->create([]));
    }

    public function testUserUpdate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->update([]));
    }

    public function testUserGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->getUsers([]));
    }

    public function testArchiveUser()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('delete')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->archiveUser(''));
    }

    public function testDeleteUser()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('delete')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->deleteUser(''));
    }

    public function testPermanentlyDeleteUser()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $users = new IntercomUsers($stub);
        $this->assertEquals('foo', $users->permanentlyDeleteUser(''));
    }
}
