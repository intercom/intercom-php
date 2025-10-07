<?php

namespace Intercom\Legacy\Test;

use Intercom\Legacy\IntercomTags;

class IntercomTagsTest extends TestCase
{
    public function testTagUsers()
    {
        $this->client->method('post')->willReturn('foo');

        $tags = new IntercomTags($this->client);
        $this->assertSame('foo', $tags->tag([]));
    }

    public function testTagsList()
    {
        $this->client->method('get')->willReturn('foo');

        $tags = new IntercomTags($this->client);
        $this->assertSame('foo', $tags->getTags());
    }
}
