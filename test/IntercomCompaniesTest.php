<?php

use Intercom\IntercomCompanies;
use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomCompaniesTest extends PHPUnit_Framework_TestCase
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
}
