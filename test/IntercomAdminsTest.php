<?php

namespace Intercom\Test;

use Intercom\IntercomAdmins;
use PHPUnit\Framework\TestCase;

class IntercomAdminsTest extends TestCase
{
    public function testAdminsList()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomAdmins($stub);
        $this->assertEquals('foo', $users->getAdmins());
    }

    public function testAdminsGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomAdmins($stub);
        $this->assertEquals('foo', $users->getAdmin(1));
    }

    public function testAdminsGetPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();

        $users = new IntercomAdmins($stub);
        $this->assertEquals('admins/1', $users->adminPath(1));
    }
}
