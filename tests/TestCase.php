<?php

namespace Intercom\Test;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as Guzzle6Client;
use Http\Adapter\Guzzle7\Client as Guzzle7Client;
use Http\Client\HttpClient;
use Intercom\IntercomClient;
use PHPUnit\Framework\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var IntercomClient|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $client;

    protected function httpClient(GuzzleClient $guzzleClient): HttpClient
    {
        if (class_exists(Guzzle7Client::class)) {
            return new Guzzle7Client($guzzleClient);
        } elseif (class_exists(Guzzle6Client::class)) {
            return new Guzzle6Client($guzzleClient);
        } else {
            throw new \RuntimeException('No supported Guzzle adapter class found');
        }
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMockBuilder(IntercomClient::class)->disableOriginalConstructor()->getMock();
    }
}
