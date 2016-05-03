<?php

use Intercom\IntercomAdmins;

class IntercomAdminsTest extends PHPUnit_Framework_TestCase {
  public function testAdminsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $users = new IntercomAdmins($stub);
    $this->assertEquals('foo', $users->getAdmins());
  }
}
