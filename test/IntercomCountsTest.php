<?php

use Intercom\IntercomCounts;

class IntercomCountsTest extends AbstractRequestBase
{
    public function testCountsList()
    {
        $this->stub->method('get')->willReturn('foo');

        $counts = new IntercomCounts($this->stub);
        $this->assertEquals('foo', $counts->getCounts([]));
    }
}
