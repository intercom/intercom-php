<?php

namespace Intercom\Test;

use Intercom\IntercomConversations;

class IntercomConversationsTest extends TestCase
{
    public function testConversationsList()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomConversations($this->client);
        $this->assertSame('foo', $users->getConversations([]));
    }

    public function testConversationPath()
    {
        $users = new IntercomConversations($this->client);
        $this->assertSame('conversations/foo', $users->conversationPath("foo"));
    }

    public function testGetConversation()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomConversations($this->client);
        $this->assertSame('foo', $users->getConversation("foo"));
    }

    public function testConversationReplyPath()
    {
        $users = new IntercomConversations($this->client);
        $this->assertSame('conversations/foo/reply', $users->conversationReplyPath("foo"));
    }

    public function testReplyToConversation()
    {
        $this->client->method('post')->willReturn('foo');

        $users = new IntercomConversations($this->client);
        $this->assertSame('foo', $users->replyToConversation("bar", []));
    }
}
