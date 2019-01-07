<?php

namespace Intercom\Test;

use Intercom\IntercomMessages;
use PHPUnit\Framework\TestCase;

class IntercomMessagesTest extends TestCase
{
    public function testMessageCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $messages = new IntercomMessages($stub);
        $this->assertEquals('foo', $messages->create([]));
    }
}
