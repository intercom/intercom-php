<?php

namespace Intercom\Test;

use Intercom\IntercomCompanies;

class IntercomCompaniesTest extends TestCase
{
    public function testCompanyCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($this->client);
        $this->assertSame('foo', $companies->create([]));
    }

    public function testCompanyUpdate()
    {
        $this->client->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($this->client);
        $this->assertSame('foo', $companies->update([]));
    }

    public function testCompanyGet()
    {
        $this->client->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($this->client);
        $this->assertSame('foo', $companies->getCompanies([]));
    }

    public function testCompanyPath()
    {
        $users = new IntercomCompanies($this->client);
        $this->assertSame('companies/foo', $users->companyPath("foo"));
    }

    public function testCompanyGetById()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomCompanies($this->client);
        $this->assertSame('foo', $users->getCompany("foo"));
    }

    public function testCompanyGetUsers()
    {
        $this->client->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($this->client);
        $this->assertSame('foo', $companies->getCompanyUsers("foo"));
    }

    public function testCompanyUsersPath()
    {
        $users = new IntercomCompanies($this->client);
        $this->assertSame('companies/foo/users', $users->companyUsersPath("foo"));
    }
}
