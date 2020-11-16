<?php

namespace Intercom\Test;

use Intercom\IntercomConversations;
use stdClass;

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

    public function testConversationSearch()
    {
        $this->client->method('post')->willReturn('foo');

        $conversations = new IntercomConversations($this->client);
        $this->assertSame('foo', $conversations->search([]));
    }

    public function testConversationNextSearch()
    {
        $this->client->method('nextSearchPage')->willReturn('foo');
        $query = [];
        $pages = new stdClass;
        $pages->per_page = "10";
        $pages->next = new stdClass;
        $pages->next->starting_after = "abc";

        $conversations = new IntercomConversations($this->client);
        $this->assertSame('foo', $conversations->nextSearch([], $pages));
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
