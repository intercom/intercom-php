<?php

namespace Intercom\Test;

use Intercom\IntercomCompanies;
use PHPUnit\Framework\TestCase;

class IntercomCompaniesTest extends TestCase
{
    public function testCompanyCreate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertSame('foo', $companies->create([]));
    }

    public function testCompanyUpdate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertSame('foo', $companies->update([]));
    }

    public function testCompanyGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertSame('foo', $companies->getCompanies([]));
    }

    public function testCompanyPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $users = new IntercomCompanies($stub);
        $this->assertSame('companies/foo', $users->companyPath("foo"));
    }

    public function testCompanyGetById()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomCompanies($stub);
        $this->assertSame('foo', $users->getCompany("foo"));
    }

    public function testCompanyGetUsers()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertSame('foo', $companies->getCompanyUsers("foo"));
    }

    public function testCompanyUsersPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $users = new IntercomCompanies($stub);
        $this->assertSame('companies/foo/users', $users->companyUsersPath("foo"));
    }
}
