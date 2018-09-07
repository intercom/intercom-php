<?php

namespace Intercom\Test;

use Intercom\IntercomMessages;

class IntercomMessagesTest extends \PHPUnit_Framework_TestCase
{
    public function testMessageCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $messages = new IntercomMessages($stub);
        $this->assertEquals('foo', $messages->create([]));
    }
}
