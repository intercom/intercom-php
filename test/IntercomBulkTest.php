<?php

use Intercom\IntercomBulk;

class IntercomBulkTest extends AbstractRequestBase
{
    public function testBulkUsers()
    {
        $this->stub->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($this->stub);
        $this->assertEquals('bulk/users', $bulk->users([]));
    }

    public function testBulkEvents()
    {
        $this->stub->method('post')->will($this->returnArgument(0));

        $bulk = new IntercomBulk($this->stub);
        $this->assertEquals('bulk/events', $bulk->events([]));
    }
}
