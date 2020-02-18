<?php

namespace Intercom\Test;

use Intercom\IntercomCustomers;

class IntercomCustomersTest extends TestCase
{
    public function testCustomerSearch()
    {
        $this->client->method('post')->willReturn('foo');

        $customers = new IntercomCustomers($this->client);
        $this->assertSame('foo', $customers->search(["query" => []]));
    }
}
