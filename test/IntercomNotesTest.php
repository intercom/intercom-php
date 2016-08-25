<?php

use Intercom\IntercomNotes;

class IntercomNotesTest extends AbstractRequestBase
{
    public function testNoteCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $notes = new IntercomNotes($this->stub);
        $this->assertEquals('foo', $notes->create([]));
    }

    public function testNotesList()
    {
        $this->stub->method('get')->willReturn('foo');

        $notes = new IntercomNotes($this->stub);
        $this->assertEquals('foo', $notes->getNotes([]));
    }

    public function testNotesGet()
    {
        $this->stub->method('get')->will($this->returnArgument(0));

        $notes = new IntercomNotes($this->stub);
        $this->assertEquals('notes/foo', $notes->getNote("foo"));
    }
}
