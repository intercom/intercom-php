<?php

namespace Intercom\Test;

use Intercom\IntercomEvents;

class IntercomEventsTest extends TestCase
{
    public function testEventCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $users = new IntercomEvents($this->client);
        $this->assertSame('foo', $users->create([]));
    }

    public function testEventsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomEvents($this->client);
        $this->assertSame('foo', $users->getEvents([]));
    }
}
