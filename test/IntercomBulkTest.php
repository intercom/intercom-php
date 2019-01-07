<?php

namespace Intercom\Test;

use Intercom\IntercomBulk;
use PHPUnit\Framework\TestCase;

class IntercomBulkTest extends TestCase
{
    public function testBulkUsers()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($stub);
        $this->assertEquals('bulk/users', $bulk->users([]));
    }

    public function testBulkEvents()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($stub);
        $this->assertEquals('bulk/events', $bulk->events([]));
    }
}
