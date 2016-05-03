<?php

use Intercom\IntercomCounts;

class IntercomCountsTest extends PHPUnit_Framework_TestCase {
  public function testCountsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $counts = new IntercomCounts($stub);
    $this->assertEquals('foo', $counts->getCounts([]));
  }
}
