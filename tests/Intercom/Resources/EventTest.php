<?php

namespace Intercom;

class EventTest extends IntercomTestCase
{
    public function testCreateEvent()
    {
        $this->setMockResponse($this->client, 'Event/Event.txt');
        $this->client->createEvent(['created_at' => 1401970113, 'event_name' => 'invited-friend']);

        $this->assertRequest('POST', '/events');
        $this->assertRequestJson(['created_at' => 1401970113, 'event_name' => 'invited-friend']);
    }

    /*
     * Empty associative arrays get mapped to [] in PHP
     * Check that we filter them out to nulls, which are valid on the server
     */
    public function testNoMetadata()
    {
        $this->setMockResponse($this->client, 'Event/Event.txt');
        $this->client->createEvent(['metadata' => [], 'created_at' => 1401970113, 'event_name' => 'invited-friend']);

        $this->assertRequest('POST', '/events');
        $body = $this->getOnlyMockedRequest()->getBody()->__toString();
        $json = json_decode($body);
        $this->assertEquals(NULL, $json->metadata);
    }

    /*
     * Check that our array filtering doesn't interfere with valid metadata
     */
    public function testMetadata()
    {
        $this->setMockResponse($this->client, 'Event/Event.txt');
        $this->client->createEvent(['metadata' => ['foo' => 'bar'], 'created_at' => 1401970113, 'event_name' => 'invited-friend']);

        $this->assertRequest('POST', '/events');
        $body = $this->getOnlyMockedRequest()->getBody()->__toString();
        $json = json_decode($body);
        $this->assertEquals('bar', $json->metadata->foo);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateEventNoParameters()
    {
        $this->client->createEvent();
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateEventNoCreatedAt()
    {
        $this->client->createEvent(['event_name' => 'invited-friend']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateEventNoEventName()
    {
        $this->client->createEvent(['created_at' => 1401970113]);
    }
}
