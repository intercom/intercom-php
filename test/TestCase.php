<?php

namespace Intercom\Test;

use Intercom\IntercomClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var IntercomClient|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $client;

    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->getMockBuilder(IntercomClient::class)->disableOriginalConstructor()->getMock();
    }
}
