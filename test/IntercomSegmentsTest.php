<?php

namespace Intercom\Test;

use Intercom\IntercomSegments;
use PHPUnit_Framework_TestCase;

class IntercomSegmentTest extends PHPUnit_Framework_TestCase
{

    public function testSegmentList()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $segments = new IntercomSegments($stub);
        $this->assertEquals('foo', $segments->getSegments());
    }
}
