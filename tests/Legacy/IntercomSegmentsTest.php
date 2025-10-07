<?php

namespace Intercom\Legacy\Test;

use Intercom\Legacy\IntercomSegments;

class IntercomSegmentsTest extends TestCase
{
    public function testSegmentList()
    {
        $this->client->method('get')->willReturn('foo');

        $segments = new IntercomSegments($this->client);
        $this->assertSame('foo', $segments->getSegments());
    }
}
