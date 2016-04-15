<?php

use Intercom\IntercomBulk;

class IntercomBulkTest extends PHPUnit_Framework_TestCase {
  public function testBulkUsers()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->will($this->returnArgument(0));

    $bulk = new IntercomBulk($stub);
    $this->assertEquals('bulk/users', $bulk->users([]));
  }

  public function testBulkEvents()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->will($this->returnArgument(0));

    $bulk = new IntercomBulk($stub);
    $this->assertEquals('bulk/events', $bulk->events([]));
  }
}
