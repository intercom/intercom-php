<?php

namespace Intercom\Test;

use Intercom\IntercomNotes;

class IntercomNotesTest extends TestCase
{
    public function testNoteCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $notes = new IntercomNotes($this->client);
        $this->assertSame('foo', $notes->create([]));
    }

    public function testNotesList()
    {
        $this->client->method('get')->willReturn('foo');

        $notes = new IntercomNotes($this->client);
        $this->assertSame('foo', $notes->getNotes([]));
    }

    public function testNotesGet()
    {
        $this->client->method('get')->will($this->returnArgument(0));

        $notes = new IntercomNotes($this->client);
        $this->assertSame('notes/foo', $notes->getNote("foo"));
    }
}
