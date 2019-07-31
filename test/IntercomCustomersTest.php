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

        $customers = new IntercomCustomers($stub);
        $this->assertEquals('foo', $customers->search(["query": []]));
    }
}
