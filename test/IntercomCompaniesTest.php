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
        $this->assertEquals('foo', $companies->create([]));
    }

    public function testCompanyUpdate()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertEquals('foo', $companies->update([]));
    }

    public function testCompanyGet()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($stub);
        $this->assertEquals('foo', $companies->getCompanies([]));
    }

    public function testCompanyPath()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $users = new IntercomCompanies($stub);
        $this->assertEquals('companies/foo', $users->companyPath("foo"));
    }

    public function testCompanyGetById()
    {
        $stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn('foo');

        $users = new IntercomCompanies($stub);
        $this->assertEquals('foo', $users->getCompany("foo"));
    }
}
