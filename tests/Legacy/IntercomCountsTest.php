<?php

namespace Intercom\Legacy\Test;

use Intercom\Legacy\IntercomCounts;

class IntercomCountsTest extends TestCase
{
    public function testCountsList()
    {
        $this->client->method('get')->willReturn('foo');

        $counts = new IntercomCounts($this->client);
        $this->assertSame('foo', $counts->getCounts([]));
    }
}
