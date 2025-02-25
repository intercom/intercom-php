<?php

namespace Intercom\Test;

use Intercom\IntercomAdmins;

class IntercomAdminsTest extends TestCase
{
    public function testAdminsList()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomAdmins($this->client);
        $this->assertSame('foo', $users->getAdmins());
    }

    public function testAdminsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomAdmins($this->client);
        $this->assertSame('foo', $users->getAdmin(1));
    }
}
