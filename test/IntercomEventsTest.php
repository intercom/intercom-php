<?php

use Intercom\IntercomEvents;

class IntercomEventsTest extends AbstractRequestBase
{
    public function testEventCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $users = new IntercomEvents($this->stub);
        $this->assertEquals('foo', $users->create([]));
    }

    public function testEventsGet()
    {
        $this->stub->method('get')->willReturn('foo');

        $users = new IntercomEvents($this->stub);
        $this->assertEquals('foo', $users->getEvents([]));
    }
}
