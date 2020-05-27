<?php

namespace Intercom\Test;

use Intercom\IntercomContacts;

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
        $this->assertSame('foo', $contacts->update([]));
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

    public function testContactSearch()
    {
        $this->client->method('post')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->search([]));
    }

    public function testContactDelete()
    {
        $this->client->method('delete')->willReturn('foo');

        $contacts = new IntercomContacts($this->client);
        $this->assertSame('foo', $contacts->deleteContact(''));
    }
}
