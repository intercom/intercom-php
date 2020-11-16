<?php

namespace Intercom\Test;

use Intercom\IntercomLeads;

class IntercomLeadsTest extends TestCase
{
    public function testLeadCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->create([]));
    }

    public function testLeadUpdate()
    {
        $this->client->method('post')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->update([]));
    }

    public function testLeadsList()
    {
        $this->client->method('get')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->getLeads([]));
    }

    public function testLeadPath()
    {

        $leads = new IntercomLeads($this->client);
        $this->assertSame("contacts/foo", $leads->leadPath("foo"));
    }

    public function testLeadsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->getLead("bar"));
    }

    public function testLeadsConvert()
    {
        $this->client->method('post')->will($this->returnArgument(0));

        $leads = new IntercomLeads($this->client);
        $this->assertSame('contacts/convert', $leads->convertLead([]));
    }

    public function testLeadsDelete()
    {
        $this->client->method('delete')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->deleteLead("bar"));
    }

    public function testLeadsScroll()
    {
        $this->client->method('get')->willReturn('foo');

        $leads = new IntercomLeads($this->client);
        $this->assertSame('foo', $leads->scrollLeads([]));
    }
}
