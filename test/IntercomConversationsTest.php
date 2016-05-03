<?php

use Intercom\IntercomConversations;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomConversationsTest extends PHPUnit_Framework_TestCase {
  public function testConversationsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $users = new IntercomConversations($stub);
    $this->assertEquals('foo', $users->getConversations([]));
  }

  public function testConversationPath()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $users = new IntercomConversations($stub);
    $this->assertEquals('conversations/foo', $users->conversationPath("foo"));
  }

  public function testGetConversation()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $users = new IntercomConversations($stub);
    $this->assertEquals('foo', $users->getConversation("foo"));
  }

  public function testConversationReplyPath()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $users = new IntercomConversations($stub);
    $this->assertEquals('conversations/foo/reply', $users->conversationReplyPath("foo"));
  }

  public function testReplyToConversation()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $users = new IntercomConversations($stub);
    $this->assertEquals('foo', $users->replyToConversation("bar", []));
  }
}
