<?php

namespace Intercom\Test;

use Intercom\IntercomCustomers;
use PHPUnit\Framework\TestCase;

class IntercomCustomersTest extends TestCase
{
    public function testCustomerSearch()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $customers = new IntercomCustomers($stub);
        $this->assertSame('foo', $customers->search(["query" => []]));
    }
}
