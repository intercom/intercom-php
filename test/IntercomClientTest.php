<?php

use Intercom\IntercomClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class IntercomClientTest extends PHPUnit_Framework_TestCase {
  public function testBasicClient()
  {
    $mock = new MockHandler([
      new Response(200, ['X-Foo' => 'Bar'], "{\"foo\":\"bar\"}")
    ]);

    $container = [];
    $history = Middleware::history($container);
    $stack = HandlerStack::create($mock);
    $stack->push($history);

    $http_client = new Client(['handler' => $stack]);

    $client = new IntercomClient('u', 'p');
    $client->setClient($http_client);

    $client->users->create([
      'email' => 'test@intercom.io'
    ]);

    foreach ($container as $transaction) {
      $basic = $transaction['request']->getHeaders()['Authorization'][0];
      $this->assertTrue($basic == "Basic dTpw");
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

    $http_client = new Client(['handler' => $stack]);

    $client = new IntercomClient('u', 'p');
    $client->setClient($http_client);

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
    $time = time() + 7;
    $mock = new MockHandler([
        new Response(200, ['X-RateLimit-Limit' => '83', 'X-RateLimit-Remaining' => '2', 'X-RateLimit-Reset' => $time], "{\"foo\":\"bar\"}")
    ]);

    $container = [];
    $history = Middleware::history($container);
    $stack = HandlerStack::create($mock);
    $stack->push($history);

    $http_client = new Client(['handler' => $stack]);

    $client = new IntercomClient('u', 'p');
    $client->setClient($http_client);

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
