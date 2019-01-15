<?php

namespace Intercom\Test;

use Intercom\IntercomEvents;
use PHPUnit\Framework\TestCase;

class IntercomEventsTest extends TestCase
{
    public function testEventCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $users = new IntercomEvents($stub);
        $this->assertEquals('foo', $users->create([]));
    }

    public function testEventsGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomEvents($stub);
        $this->assertEquals('foo', $users->getEvents([]));
    }
}
