<?php

namespace Intercom;

use Guzzle\Tests\GuzzleTestCase;

class UserTest extends IntercomTestCase
{
    public function testGetUserByID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->getUser(["id" => "123456"]);
        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response["name"]);
    }

    public function testGetUserByEmail()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->getUser(["email" => "a@example.org"]);
        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response["name"]);
    }

    public function testGetUserByUserID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->getUser(["user_id" => "hgsdfhsasdfg"]);
        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response["name"]);
    }

    public function testCreateUser()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->createUser(["id" => "123456"]);
        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response["name"]);
    }

    public function testUpdateUser()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->updateUser(["id" => "123456", "updated_at" => time()]);
        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response["name"]);
    }

    public function testGetUsers()
    {
        $this->setMockResponse($this->client, 'User/Users.txt');
        $response = $this->client->getUsers();
        $users = $response->get('users');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('user1@example.com', $users['0']['email']);
        $this->assertEquals('user2@example.com', $users['1']['email']);
        $this->assertEquals('user3@example.com', $users['2']['email']);
    }
}