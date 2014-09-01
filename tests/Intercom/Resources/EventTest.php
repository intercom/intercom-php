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