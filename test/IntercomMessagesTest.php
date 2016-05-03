<?php

use Intercom\IntercomMessages;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomMessagesTest extends PHPUnit_Framework_TestCase {
  public function testMessageCreate()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $messages = new IntercomMessages($stub);
    $this->assertEquals('foo', $messages->create([]));
  }
}
