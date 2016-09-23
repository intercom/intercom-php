<?php

use Intercom\IntercomTags;

class IntercomTagsTest extends AbstractRequestBase
{
    public function testTagUsers()
    {
        $this->stub->method('post')->willReturn('foo');

        $tags = new IntercomTags($this->stub);
        $this->assertEquals('foo', $tags->tag([]));
    }

    public function testTagsList()
    {
        $this->stub->method('get')->willReturn('foo');

        $tags = new IntercomTags($this->stub);
        $this->assertEquals('foo', $tags->getTags());
    }
}
