<?php

use Intercom\IntercomEvents;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomEventsTest extends PHPUnit_Framework_TestCase {
  public function testEventCreate()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $users = new IntercomEvents($stub);
    $this->assertEquals('foo', $users->create([]));
  }

  public function testEventsGet()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $users = new IntercomEvents($stub);
    $this->assertEquals('foo', $users->getEvents([]));
  }
}
