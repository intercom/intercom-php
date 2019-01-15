<?php

namespace Intercom\Test;

use Intercom\IntercomCounts;
use PHPUnit\Framework\TestCase;

class IntercomCountsTest extends TestCase
{
    public function testCountsList()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $counts = new IntercomCounts($stub);
        $this->assertEquals('foo', $counts->getCounts([]));
    }
}
