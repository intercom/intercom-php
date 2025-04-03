<?php

namespace Intercom\Test;

use Intercom\IntercomTags;

class IntercomTagsTest extends TestCase
{
    public function testCreateTag()
    {
        $this->client->method('post')->willReturn('foo');
        $tags = new IntercomTags($this->client);
        
        $options = [
            'name' => 'TestTag',
            'contacts' => [['id' => 'abc123']]
        ];
        
        $this->assertSame('foo', $tags->tag($options));
    }

    public function testListTags()
    {
        $this->client->method('get')->willReturn('foo');
        $tags = new IntercomTags($this->client);
        
        // Test without options
        $this->assertSame('foo', $tags->getTags());
        
        // Test with options
        $options = ['type' => 'contact'];
        $this->assertSame('foo', $tags->getTags($options));
    }
}
