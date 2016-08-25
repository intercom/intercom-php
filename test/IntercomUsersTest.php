<?php

use Intercom\IntercomUsers;

class IntercomUsersTest extends AbstractRequestBase
{
    public function testUserCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $events = new IntercomUsers($this->stub);
        $this->assertEquals('foo', $events->create([]));
    }

    public function testUserGet()
    {
        $this->stub->method('get')->willReturn('foo');

        $events = new IntercomUsers($this->stub);
        $this->assertEquals('foo', $events->getUsers([]));
    }
}
