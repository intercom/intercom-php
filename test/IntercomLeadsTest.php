<?php

use Intercom\IntercomLeads;

class IntercomLeadsTest extends AbstractRequestBase
{
    public function testLeadCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $leads = new IntercomLeads($this->stub);
        $this->assertEquals('foo', $leads->create([]));
    }

    public function testLeadsList()
    {
        $this->stub->method('get')->willReturn('foo');

        $leads = new IntercomLeads($this->stub);
        $this->assertEquals('foo', $leads->getLeads([]));
    }

    public function testLeadPath()
    {
        $leads = new IntercomLeads($this->stub);
        $this->assertEquals($leads->leadPath("foo"), "contacts/foo");
    }

    public function testLeadsGet()
    {
        $this->stub->method('get')->willReturn('foo');

        $leads = new IntercomLeads($this->stub);
        $this->assertEquals('foo', $leads->getLead("bar"));
    }

    public function testLeadsConvert()
    {
        $this->stub->method('post')->will($this->returnArgument(0));

        $leads = new IntercomLeads($this->stub);
        $this->assertEquals('contacts/convert', $leads->convertLead([]));
    }

    public function testLeadsDelete()
    {
        $this->stub->method('delete')->willReturn('foo');

        $leads = new IntercomLeads($this->stub);
        $this->assertEquals('foo', $leads->deleteLead("bar"));
    }
}
