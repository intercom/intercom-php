<?php

namespace Intercom;

class JobTest extends IntercomTestCase
{
  public function testGetJob()
  {
      $this->setMockResponse($this->client, 'Job/MockJob.txt');
      $response = $this->client->getJob(['id' => 'job_5ca1ab1eca11ab1e']);

      $this->assertBasicAuth('my-app', '1234');
      $this->assertRequest('GET', '/jobs/job_5ca1ab1eca11ab1e');

      $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
      $this->assertEquals(1438944983, $response['updated_at']);
  }
  public function testGetJobErrors()
  {
      $this->setMockResponse($this->client, 'Job/MockErrorFeed.txt');
      $response = $this->client->getJobErrors(['id' => 'job_5ca1ab1eca11ab1e']);

      $this->assertBasicAuth('my-app', '1234');
      $this->assertRequest('GET', '/jobs/job_5ca1ab1eca11ab1e/error');

      $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
      $this->assertEquals('email invalid', $response['items'][0]['error']['message']);
  }
}
