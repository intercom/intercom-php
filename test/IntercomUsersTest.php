<?php

use Intercom\IntercomUsers;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomUsersTest extends PHPUnit_Framework_TestCase {
  public function testUserCreate()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $events = new IntercomUsers($stub);
    $this->assertEquals('foo', $events->create([]));
  }

  public function testUserGet()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $events = new IntercomUsers($stub);
    $this->assertEquals('foo', $events->getUsers([]));
  }
}
