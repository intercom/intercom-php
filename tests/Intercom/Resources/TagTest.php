<?php

namespace Intercom;

class TagTest extends IntercomTestCase
{

    public function testCreateTag()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $response = $this->client->createTag(['does_not_exist' => true ,'name' => 'New']);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['name' => 'New']);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('independent', $response['name']);
    }

    public function testUpdateTag()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $response = $this->client->updateTag(['id' => '123456', 'name' => 'New', 'hi' => 'hello']);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['id' => '123456', 'name' => 'New']);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('independent', $response['name']);
    }

    public function testGetTags()
    {
        $this->setMockResponse($this->client, 'Tag/TagList.txt');
        $response = $this->client->getTags();
        $tags = $response->get('tags');

        $this->assertRequest('GET', '/tags');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(3, count($tags));
        $this->assertEquals('Beta User', $tags['0']['name']);
        $this->assertEquals('Amazing User', $tags['1']['name']);
        $this->assertEquals('Epic User', $tags['2']['name']);
    }

    public function testTagUsers()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $this->client->tagUsers(['name' => 'independent', 'users' => [['id' => '12'], ['email' => 'bob@example.org']]]);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['name' => 'independent', 'users' => [['id' => '12'], ['email' => 'bob@example.org']]]);
    }

    public function testUntagUsers()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $this->client->tagUsers(['name' => 'independent', 'users' => [['id' => '12', 'untag' => true]]]);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['name' => 'independent', 'users' => [['id' => '12', 'untag' => true]]]);
    }

    public function testTagCompanies()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $this->client->tagCompanies(['name' => 'independent', 'companies' => [['id' => '20']]]);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['name' => 'independent', 'companies' => [['id' => '20']]]);
    }

    public function testUntagCompanies()
    {
        $this->setMockResponse($this->client, 'Tag/Tag.txt');
        $this->client->tagCompanies(['name' => 'independent', 'companies' => [['id' => '20', 'untag' => true]]]);

        $this->assertRequest('POST', '/tags');
        $this->assertRequestJson(['name' => 'independent', 'companies' => [['id' => '20', 'untag' => true]]]);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateTagNoName()
    {
        $this->client->createTag();
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testUpdateTagNoID()
    {
        $this->client->updateTag(['name' => 'New']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testUpdateTagNoName()
    {
        $this->client->updateTag(['id' => '123456']);
    }
}