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

    $client->nextPage([
      'next' => 'https://foo.com'
    ]);

    foreach ($container as $transaction) {
      $host = $transaction['request']->getUri()->getHost();
      $this->assertTrue($host == "foo.com");
    }
  }

  public function test404Response()
  {
    $mock = new MockHandler([
      new Response(404, ['X-Foo' => 'Bar'], "{\"type\":\"error.list\",\"request_id\":\"aq5mh23br4kkd5orbrt0\",\"errors\":[{\"code\":\"not_found\",\"message\":\"User Not Found\"}]}")
    ]);

    $container = [];
    $history = Middleware::history($container);
    $stack = HandlerStack::create($mock);
    $stack->push($history);

    $http_client = new Client(['handler' => $stack]);

    $client = new IntercomClient('u', 'p');
    $client->setClient($http_client);

    $res = $client->users->getUser("570680a8a1bcbca8a90001b9");
    $this->assertTrue($res->type == "error.list");

  }

}
