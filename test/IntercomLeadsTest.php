<?php

namespace Intercom\Test;

use Intercom\IntercomLeads;
use PHPUnit\Framework\TestCase;

class IntercomLeadsTest extends TestCase
{
    public function testLeadCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->create([]));
    }

    public function testLeadUpdate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->update([]));
    }

    public function testLeadsList()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->getLeads([]));
    }

    public function testLeadPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $leads = new IntercomLeads($stub);
        $this->assertSame($leads->leadPath("foo"), "contacts/foo");
    }

    public function testLeadsGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->getLead("bar"));
    }

    public function testLeadsConvert()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->will($this->returnArgument(0));

        $leads = new IntercomLeads($stub);
        $this->assertSame('contacts/convert', $leads->convertLead([]));
    }

    public function testLeadsDelete()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('delete')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->deleteLead("bar"));
    }

    public function testLeadsScroll()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $leads = new IntercomLeads($stub);
        $this->assertSame('foo', $leads->scrollLeads([]));
    }
}
