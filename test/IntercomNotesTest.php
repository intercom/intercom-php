<?php

namespace Intercom\Test;

use Intercom\IntercomNotes;
use PHPUnit\Framework\TestCase;

class IntercomNotesTest extends TestCase
{
    public function testNoteCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $notes = new IntercomNotes($stub);
        $this->assertEquals('foo', $notes->create([]));
    }

    public function testNotesList()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $notes = new IntercomNotes($stub);
        $this->assertEquals('foo', $notes->getNotes([]));
    }

    public function testNotesGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->will($this->returnArgument(0));

        $notes = new IntercomNotes($stub);
        $this->assertEquals('notes/foo', $notes->getNote("foo"));
    }
}
