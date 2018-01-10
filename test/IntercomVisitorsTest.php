<?php

use Intercom\IntercomVisitors;

class IntercomVisitorsTest extends PHPUnit_Framework_TestCase
{

    public function testVisitorUpdate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('put')->willReturn('foo');

        $visitors = new IntercomVisitors($stub);
        $this->assertEquals('foo', $visitors->update([]));
    }

    public function testVisitorPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $visitors = new IntercomVisitors($stub);
        $this->assertEquals($visitors->visitorPath("foo"), "visitors/foo");
    }

    public function testVisitorsGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $visitors = new IntercomVisitors($stub);
        $this->assertEquals('foo', $visitors->getVisitor("bar"));
    }

    public function testVisitorsConvert()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->will($this->returnArgument(0));

        $visitors = new IntercomVisitors($stub);
        $this->assertEquals('visitors/convert', $visitors->convertVisitor([]));
    }

    public function testVisitorsDelete()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('delete')->willReturn('foo');

        $visitors = new IntercomVisitors($stub);
        $this->assertEquals('foo', $visitors->deleteVisitor("bar"));
    }
}
