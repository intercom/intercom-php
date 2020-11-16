<?php

namespace Intercom\Test;

use Intercom\IntercomVisitors;

class IntercomVisitorsTest extends TestCase
{
    public function testVisitorUpdate()
    {
        $this->client->method('put')->willReturn('foo');

        $visitors = new IntercomVisitors($this->client);
        $this->assertSame('foo', $visitors->update([]));
    }

    public function testVisitorPath()
    {
        $visitors = new IntercomVisitors($this->client);
        $this->assertSame("visitors/foo", $visitors->visitorPath("foo"));
    }

    public function testVisitorsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $visitors = new IntercomVisitors($this->client);
        $this->assertSame('foo', $visitors->getVisitor("bar"));
    }

    public function testVisitorsConvert()
    {

        $this->client->method('post')->will($this->returnArgument(0));

        $visitors = new IntercomVisitors($this->client);
        $this->assertSame('visitors/convert', $visitors->convertVisitor([]));
    }

    public function testVisitorsDelete()
    {
        $this->client->method('delete')->willReturn('foo');

        $visitors = new IntercomVisitors($this->client);
        $this->assertSame('foo', $visitors->deleteVisitor("bar"));
    }
}
