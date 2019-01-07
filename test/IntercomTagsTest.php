<?php

namespace Intercom\Test;

use Intercom\IntercomTags;
use PHPUnit\Framework\TestCase;

class IntercomTagsTest extends TestCase
{
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
