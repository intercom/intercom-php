<?php

namespace Intercom\Test;

use Intercom\IntercomBulk;

class IntercomBulkTest extends TestCase
{
    public function testBulkUsers()
    {
        $this->client->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($this->client);
        $this->assertSame('bulk/users', $bulk->users([]));
    }

    public function testBulkEvents()
    {
        $this->client->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($this->client);
        $this->assertSame('bulk/events', $bulk->events([]));
    }
}
