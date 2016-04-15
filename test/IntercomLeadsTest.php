<?php

use Intercom\IntercomLeads;

class IntercomLeadsTest extends PHPUnit_Framework_TestCase {
  public function testLeadCreate()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $leads = new IntercomLeads($stub);
    $this->assertEquals('foo', $leads->create([]));
  }

  public function testLeadsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $leads = new IntercomLeads($stub);
    $this->assertEquals('foo', $leads->getLeads([]));
  }

  public function testLeadPath()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $leads = new IntercomLeads($stub);
    $this->assertEquals($leads->leadPath("foo"), "contacts/foo");
  }

  public function testLeadsGet()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $leads = new IntercomLeads($stub);
    $this->assertEquals('foo', $leads->getLead("bar"));
  }

  public function testLeadsConvert()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->will($this->returnArgument(0));

    $leads = new IntercomLeads($stub);
    $this->assertEquals('contacts/convert', $leads->convertLead([]));
  }

  public function testLeadsDelete()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('delete')->willReturn('foo');

    $leads = new IntercomLeads($stub);
    $this->assertEquals('foo', $leads->deleteLead("bar"));
  }
}
