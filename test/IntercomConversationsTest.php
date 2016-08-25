<?php

use Intercom\IntercomConversations;

class IntercomConversationsTest extends AbstractRequestBase
{
    public function testConversationsList()
    {
        $this->stub->method('get')->willReturn('foo');

        $users = new IntercomConversations($this->stub);
        $this->assertEquals('foo', $users->getConversations([]));
    }

    public function testConversationPath()
    {
        $users = new IntercomConversations($this->stub);
        $this->assertEquals('conversations/foo', $users->conversationPath("foo"));
    }

    public function testGetConversation()
    {
        $this->stub->method('get')->willReturn('foo');

        $users = new IntercomConversations($this->stub);
        $this->assertEquals('foo', $users->getConversation("foo"));
    }

    public function testConversationReplyPath()
    {
        $users = new IntercomConversations($this->stub);
        $this->assertEquals('conversations/foo/reply', $users->conversationReplyPath("foo"));
    }

    public function testReplyToConversation()
    {
        $this->stub->method('post')->willReturn('foo');

        $users = new IntercomConversations($this->stub);
        $this->assertEquals('foo', $users->replyToConversation("bar", []));
    }
}
