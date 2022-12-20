<?php

namespace Intercom\Test;

use Intercom\IntercomContacts;
use stdClass;

class IntercomContactsTest extends TestCase
{
    public function testContactCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->create([]));
    }

    public function testContactUpdate()
    {
        $this->client->method('put')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->update('', []));
    }

    public function testContactsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->getContacts([]));
    }

    public function testContactGet()
    {
        $this->client->method('get')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->getContact("123"));
    }

    public function testContactDelete()
    {
        $this->client->method('delete')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->deleteContact(''));
    }

    public function testContactSearch()
    {
        $this->client->method('post')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->search([]));
    }

    public function testContactNextSearch()
    {
        $this->client->method('nextSearchPage')->willReturn('foo');
        $query = [];
        $pages = new stdClass;
        $pages->per_page = "10";
        $pages->next = new stdClass;
        $pages->next->starting_after = "abc";

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->nextSearch([], $pages));
    }

    public function testConversationNextCursor()
    {
        $this->client->method('nextCursorPage')->willReturn('foo');
        $query = [];
        $pages = new stdClass;
        $pages->next = new stdClass;
        $pages->next->starting_after = "abc";

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->nextCursor($pages));
    }
}
