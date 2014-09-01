<?php

namespace Intercom;

class AdminTest extends IntercomTestCase
{
    public function testGetAdmins()
    {
        $this->setMockResponse($this->client, 'Admin/AdminList.txt');
        $response = $this->client->getAdmins();
        $admins = $response->get('admins');

        $this->assertRequest('GET', '/admins');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(2, count($admins));
        $this->assertEquals('Hoban Washburne', $admins['0']['name']);
        $this->assertEquals('Zoe Alleyne', $admins['1']['name']);
    }
}