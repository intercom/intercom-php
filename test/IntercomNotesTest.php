<?php

use Intercom\IntercomNotes;

class IntercomNotesTest extends PHPUnit_Framework_TestCase {
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
