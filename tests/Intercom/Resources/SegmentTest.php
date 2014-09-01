<?php

namespace Intercom;

class SegmentTest extends IntercomTestCase
{
    public function testGetSegment()
    {
        $this->setMockResponse($this->client, 'Segment/Segment.txt');
        $response = $this->client->getSegment(['id' => '123456']);

        $this->assertBasicAuth('my-app', '1234');
        $this->assertRequest('GET', '/segments/123456');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('New', $response['name']);
    }

    public function testGetSegments()
    {
        $this->setMockResponse($this->client, 'Segment/SegmentList.txt');
        $response = $this->client->getSegments();
        $segments = $response->get('segments');

        $this->assertRequest('GET', '/segments');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(3, count($segments));
        $this->assertEquals('Active', $segments['0']['name']);
        $this->assertEquals('New', $segments['1']['name']);
        $this->assertEquals('Slipping Away', $segments['2']['name']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testGetSegmentNoID()
    {
        $this->client->getSegment();
    }
}