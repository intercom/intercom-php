<?php

namespace Intercom;

class IntercomExceptionTest extends IntercomTestCase
{
    public function test404Exception()
    {
        try {
            $this->setMockResponse($this->client, 'Error/Error.txt');
            $response = $this->client->getUser(['id' => '123456']);
            $this->fail('An Exception\ClientErrorResponseException for a 404 response should have been raised');
        }
        catch (Exception\ClientErrorResponseException $expected) {
            $errors = $expected->getErrors();
            $this->assertEquals(1, count($errors));
            $this->assertEquals('not_found', $errors[0]['code'] );
            $this->assertEquals('No such user with id[123456]', $errors[0]['message'] );
        }
    }
}