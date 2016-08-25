<?php

use Intercom\IntercomCompanies;

class IntercomCompaniesTest extends AbstractRequestBase
{
    public function testUserCreate()
    {
        $this->stub->method('post')->willReturn('foo');

        $companies = new IntercomCompanies($this->stub);
        $this->assertEquals('foo', $companies->create([]));
    }

    public function testUserGet()
    {
        $this->stub->method('get')->willReturn('foo');

        $companies = new IntercomCompanies($this->stub);
        $this->assertEquals('foo', $companies->getCompanies([]));
    }
}
