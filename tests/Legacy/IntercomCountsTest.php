<?php

namespace Intercom\Test;

use Intercom\IntercomCounts;

class IntercomCountsTest extends TestCase
{
    public function testCountsList()
    {
        $this->client->method('get')->willReturn('foo');

        $counts = new IntercomCounts($this->client);
        $this->assertSame('foo', $counts->getCounts([]));
    }
}
