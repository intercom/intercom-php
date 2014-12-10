<?php

namespace Intercom;

use Guzzle\Tests\GuzzleTestCase;

class IntercomTestCase extends GuzzleTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = IntercomBasicAuthClient::factory(array(
            'api_key' => '1234',
            'app_id' => 'my-app'
        ));
    }

    protected function getOnlyMockedRequest($method = null, $path = null)
    {
        $requests = $this->getMockedRequests();
        $count = count($requests);

        if ($count != 1)
        {
            $this->fail("Expected 1 HTTP request, got $count!");
        }

        $request = $requests[0];

        if ($method && $path)
        {
            $this->assertRequest($method, $path, $request);
        }
        else if ($method || $path)
        {
            $this->fail('$method and $path must both be present or null.');
        }

        return $request;
    }

    protected function assertRequest($method, $path, $request = null)
    {
        if (!$request)
        {
            $request = $this->getOnlyMockedRequest();
        }

        $this->assertEquals($method, $request->getMethod());
        $this->assertEquals($path, $request->getResource());
    }

    protected function assertBasicAuth($username, $password, $request = null)
    {
        if (!$request)
        {
            $request = $this->getOnlyMockedRequest();
        }

        $header = $request->getHeader('Authorization');

        if (!$header)
        {
            $this->fail("Missing Authorization header.");
        }

        $this->assertEquals(
            'Basic ' . base64_encode("$username:$password"),
            $header->__toString()
        );
    }

    protected function assertRequestJson($object, $request = null)
    {
        if (!$request)
        {
            $request = $this->getOnlyMockedRequest();
        }

        $body = $request->getBody();
        if (!$body)
        {
            $this->fail('Missing request entity body.');

        }

        $this->assertEquals(
            json_encode($object),
            $body->__toString()
        );
    }
}

?>
