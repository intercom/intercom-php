<?php

namespace Intercom\Test;

use Intercom\IntercomMessages;

class IntercomMessagesTest extends TestCase
{
    public function testMessageCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $messages = new IntercomMessages($this->client);
        $this->assertSame('foo', $messages->create([]));
    }
}
