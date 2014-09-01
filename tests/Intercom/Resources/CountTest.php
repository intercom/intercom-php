<?php

namespace Intercom;

class CountTest extends IntercomTestCase
{
    public function testGetCounts()
    {
        $this->setMockResponse($this->client, 'Count/CountList.txt');
        $response = $this->client->getCounts();

        $this->assertRequest('GET', '/counts');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('8', $response['company']['count']);
        $this->assertEquals('47', $response['segment']['count']);
        $this->assertEquals('341', $response['tag']['count']);
        $this->assertEquals('12239', $response['user']['count']);
    }

    public function testGetConversationCount()
    {
        $this->setMockResponse($this->client, 'Count/ConversationCountList.txt');
        $response = $this->client->getConversationCount();
        $conversation_count = $response->get('conversation');

        $this->assertRequest('GET', '/counts?type=conversation');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('1', $conversation_count['assigned']);
        $this->assertEquals('15', $conversation_count['closed']);
        $this->assertEquals('1', $conversation_count['open']);
        $this->assertEquals('0', $conversation_count['unassigned']);
    }

    public function testGetAdminConversationCount()
    {
        $this->setMockResponse($this->client, 'Count/AdminConversationCountList.txt');
        $response = $this->client->getAdminConversationCount();
        $conversation_count = $response->get('conversation');

        $this->assertRequest('GET', '/counts?type=conversation&count=admin');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Wash', $conversation_count['admin'][0]['name']);
        $this->assertEquals('Jayne', $conversation_count['admin'][1]['name']);
    }

    public function testGetUserTagCount()
    {
        $this->setMockResponse($this->client, 'Count/UserTagCountList.txt');
        $response = $this->client->getUserTagCount();
        $user_count = $response->get('user');

        $this->assertRequest('GET', '/counts?type=user&count=tag');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(['Independent' => 3], $user_count['tag'][0]);
    }

    public function testGetUserSegmentCount()
    {
        $this->setMockResponse($this->client, 'Count/UserSegmentCountList.txt');
        $response = $this->client->getUserSegmentCount();
        $user_count = $response->get('user');

        $this->assertRequest('GET', '/counts?type=user&count=segment');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(['Active' => 1], $user_count['segment'][0]);
        $this->assertEquals(['New' => 0], $user_count['segment'][1]);
        $this->assertEquals(['Slipping Away' => 0], $user_count['segment'][3]);
    }

    public function testGetCompanyUserCount()
    {
        $this->setMockResponse($this->client, 'Count/CompanyUserCountList.txt');
        $response = $this->client->getCompanyUserCount();
        $company_count = $response->get('company');

        $this->assertRequest('GET', '/counts?type=company&count=user');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(['Independents' => 7, 'remote_company_id' => '6'], $company_count['user'][0]);
        $this->assertEquals(['Alliance' => 1, 'remote_company_id' => '7'], $company_count['user'][1]);
    }

    public function testGetCompanySegmentCount()
    {
        $this->setMockResponse($this->client, 'Count/CompanySegmentCountList.txt');
        $response = $this->client->getCompanySegmentCount();
        $company_count = $response->get('company');

        $this->assertRequest('GET', '/counts?type=company&count=segment');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(['Active' => 1], $company_count['segment'][0]);
        $this->assertEquals(['New' => 0], $company_count['segment'][1]);
        $this->assertEquals(['VIP' => 0], $company_count['segment'][2]);
    }

    public function testGetCompanyTagCount()
    {
        $this->setMockResponse($this->client, 'Count/CompanyTagCountList.txt');
        $response = $this->client->getCompanyTagCount();
        $company_count = $response->get('company');

        $this->assertRequest('GET', '/counts?type=company&count=tag');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(['Independent' => 0], $company_count['tag'][0]);
    }
}