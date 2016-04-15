<?php

use Intercom\IntercomTags;

class IntercomTagsTest extends PHPUnit_Framework_TestCase {
  public function testTagUsers()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('post')->willReturn('foo');

    $tags = new IntercomTags($stub);
    $this->assertEquals('foo', $tags->tag([]));
  }

  public function testTagsList()
  {
    $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    $stub->method('get')->willReturn('foo');

    $tags = new IntercomTags($stub);
    $this->assertEquals('foo', $tags->getTags());
  }
}
