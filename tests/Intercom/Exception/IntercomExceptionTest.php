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

    public function test503Exception()
    {
        try {
            $this->setMockResponse($this->client, 'Error/Error503.txt');
            $response = $this->client->getUser(['id' => '123456']);
            $this->fail('An Exception\ClientErrorResponseException for a 503 response should have been raised');
        }
        catch (Exception\ServerErrorResponseException $expected) {
            $errors = $expected->getErrors();
            $this->assertEquals(1, count($errors));
            $this->assertEquals('service_unavailable', $errors[0]['code'] );
            $this->assertEquals('Sorry, the API service is temporarily unavailable', $errors[0]['message'] );
        }
    }

    public function test503ExceptionELB()
    {
        try {
            $this->setMockResponse($this->client, 'Error/Error503ELB.txt');
            $response = $this->client->getUser(['id' => '123456']);
            $this->fail('An Exception\ClientErrorResponseException for a 503 ELB response should have been raised');
        }
        catch (Exception\ServerErrorResponseException $expected) {
            $errors = $expected->getErrors();
            $this->assertEquals(1, count($errors));
            $this->assertEquals('Service Unavailable: Back-end server is at capacity', $errors[0]['message'] );
        }
    }
}
