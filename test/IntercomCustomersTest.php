<?php

namespace Intercom\Test;

use Intercom\IntercomUsers;
use PHPUnit\Framework\TestCase;

class IntercomCustomersTest extends TestCase
{
    public function testCustomerSearch()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $users = new IntercomCustomers($stub);
        $this->assertEquals('foo', $users->search(["query": []]));
    }
}
