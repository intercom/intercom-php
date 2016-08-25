<?php

use Intercom\IntercomAdmins;

class IntercomAdminsTest extends AbstractRequestBase
{
    public function testAdminsList()
    {
        $this->stub->method('get')->willReturn('foo');

        $users = new IntercomAdmins($this->stub);
        $this->assertEquals('foo', $users->getAdmins());
    }
}
