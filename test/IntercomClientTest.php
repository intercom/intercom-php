<?php

namespace Intercom\Test;

use DateTimeImmutable;
use Http\Adapter\Guzzle6\Client;
use Intercom\IntercomClient;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use PHPUnit\Framework\TestCase;
use stdClass;

class IntercomClientTest extends TestCase
{
    public function testBasicClient()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        foreach ($container as $transaction) {
            $basic = $transaction['request']->getHeaders()['Authorization'][0];
            $this->assertTrue($basic == "Basic dTpw");
        }
    }

    public function testExtendedClient()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack, 'connect_timeout' => 10]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        foreach ($container as $transaction) {
            $options = $transaction['options'];
            $this->assertEquals($options['connect_timeout'], 10);
        }
    }

    public function testClientWithExtraHeaders()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p', ['Custom-Header' => 'value']);
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        foreach ($container as $transaction) {
            $headers = $transaction['request']->getHeaders();
            $this->assertEquals($headers['Accept'][0], 'application/json');
            $this->assertEquals($headers['Content-Type'][0], 'application/json');
            $this->assertEquals($headers['Custom-Header'][0], 'value');
        }
    }

    public function testPaginationHelper()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $pages = new stdClass;
        $pages->next = 'https://foo.com';

        $client->nextPage($pages);

        foreach ($container as $transaction) {
            $host = $transaction['request']->getUri()->getHost();
            $this->assertTrue($host == "foo.com");
        }
    }

    public function testRateLimitDetails()
    {
        date_default_timezone_set('UTC');
        $time = time() + 7;
        $mock = new MockHandler([
            new Response(
                200,
                [
                    'X-RateLimit-Limit' => '83',
                    'X-RateLimit-Remaining' => '2',
                    'X-RateLimit-Reset' => $time
                ],
                "{\"foo\":\"bar\"}"
            )
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        $rateLimitDetails = $client->getRateLimitDetails();
        $this->assertInternalType('array', $rateLimitDetails);
        $this->assertArrayHasKey('limit', $rateLimitDetails);
        $this->assertArrayHasKey('remaining', $rateLimitDetails);
        $this->assertArrayHasKey('reset_at', $rateLimitDetails);
        $this->assertEquals(83, $rateLimitDetails['limit']);
        $this->assertEquals(2, $rateLimitDetails['remaining']);
        $this->assertEquals((new DateTimeImmutable)->setTimestamp($time), $rateLimitDetails['reset_at']);
    }
}
