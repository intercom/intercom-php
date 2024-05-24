<?php

namespace Intercom\Test;

use DateTimeImmutable;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\Exception;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\Strategy\MockClientStrategy;
use Http\Mock\Client;
use Intercom\IntercomClient;
use Nyholm\Psr7\Response;
use stdClass;

class IntercomClientTest extends TestCase
{
    protected function setUp(): void
    {
        Psr18ClientDiscovery::prependStrategy(MockClientStrategy::class);
    }

    public function testBasicClient()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        );

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        foreach ($httpClient->getRequests() as $request) {
            $basic = $request->getHeaders()['Authorization'][0];
            $this->assertSame("Basic dTpw", $basic);
        }
    }

    public function testClientWithExtraHeaders()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        );

        $client = new IntercomClient('u', 'p', ['Custom-Header' => 'value']);
        $client->setHttpClient($httpClient);

        $client->users->create([
            'email' => 'test@intercom.io'
        ]);

        foreach ($httpClient->getRequests() as $request) {
            $headers = $request->getHeaders();
            $this->assertSame('application/json', $headers['Accept'][0]);
            $this->assertSame('application/json', $headers['Content-Type'][0]);
            $this->assertSame('value', $headers['Custom-Header'][0]);
        }
    }

    public function testClientErrorHandling()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(404)
        );
        $httpClient = new PluginClient($httpClient, [new ErrorPlugin()]);

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $this->expectException(Exception::class);
        $client->users->create([
            'email' => 'test@intercom.io'
        ]);
    }

    public function testServerErrorHandling()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(500)
        );
        $httpClient = new PluginClient($httpClient, [new ErrorPlugin()]);

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $this->expectException(Exception::class);
        $client->users->create([
            'email' => 'test@intercom.io'
        ]);
    }

    public function testPaginationHelper()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        );

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $pages = new stdClass;
        $pages->next = 'https://foo.com';

        $client->nextPage($pages);

        foreach ($httpClient->getRequests() as $request) {
            $host = $request->getUri()->getHost();
            $this->assertSame("foo.com", $host);
        }
    }

    public function testCursorHelper()
    {
        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
        );

        $client = new IntercomClient('u', 'p');
        $client->setHttpClient($httpClient);

        $pages = new stdClass;
        $pages->per_page = 150;
        $pages->next = new stdClass;
        $pages->next->starting_after = "abc";

        $client->nextCursorPage('path', $pages);

        foreach ($httpClient->getRequests() as $request) {
            $query = $request->getUri()->getQuery();
            $this->assertSame("starting_after=abc&per_page=150", $query);
        }
    }

    public function testRateLimitDetails()
    {
        date_default_timezone_set('UTC');
        $time = time() + 7;

        $httpClient = new Client();
        $httpClient->addResponse(
            new Response(
                200,
                [
                    'X-RateLimit-Limit' => '83',
                    'X-RateLimit-Remaining' => '2',
                    'X-RateLimit-Reset' => $time
                ],
                "{\"foo\":\"bar\"}"
            )
        );

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
