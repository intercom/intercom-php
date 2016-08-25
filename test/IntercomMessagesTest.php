<?php

use Intercom\IntercomMessages;

class IntercomMessagesTest extends AbstractRequestBase
{
    public function testMessageCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $messages = new IntercomMessages($this->stub);
        $this->assertEquals('foo', $messages->create([]));
    }
}
