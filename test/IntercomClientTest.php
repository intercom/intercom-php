<?php

namespace Intercom\Test;

use DateTimeImmutable;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Http\Adapter\Guzzle6\Client;
use Http\Client\Exception;
use Intercom\IntercomClient;
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
            $this->assertSame("Basic dTpw", $basic);
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
            $this->assertSame(10, $options['connect_timeout']);
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
            $this->assertSame('application/json', $headers['Accept'][0]);
            $this->assertSame('application/json', $headers['Content-Type'][0]);
            $this->assertSame('value', $headers['Custom-Header'][0]);
        }
    }

    public function testClientErrorHandling()
    {
        $mock = new MockHandler([
            new Response(404)
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $this->expectException(Exception::class);
        $client->users->create([
            'email' => 'test@intercom.io'
        ]);
    }

    public function testServerErrorHandling()
    {
        $mock = new MockHandler([
            new Response(500)
        ]);

        $container = [];
        $history = Middleware::history($container);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $httpClient = new Client(new GuzzleClient(['handler' => $stack]));

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $this->expectException(Exception::class);
        $client->users->create([
            'email' => 'test@intercom.io'
        ]);
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
            $this->assertSame("foo.com", $host);
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
        $this->assertIsArray($rateLimitDetails);
        $this->assertArrayHasKey('limit', $rateLimitDetails);
        $this->assertArrayHasKey('remaining', $rateLimitDetails);
        $this->assertArrayHasKey('reset_at', $rateLimitDetails);
        $this->assertSame(83, $rateLimitDetails['limit']);
        $this->assertSame(2, $rateLimitDetails['remaining']);
        $this->assertSame(
            (new DateTimeImmutable)->setTimestamp($time)->getTimestamp(),
            $rateLimitDetails['reset_at']->getTimestamp()
        );
    }
}
