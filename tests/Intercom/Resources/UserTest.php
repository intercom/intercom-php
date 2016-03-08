<?php

namespace Intercom;

class UserTest extends IntercomTestCase
{
    public function testBulk()
    {
      $this->setMockResponse($this->client, 'User/UserJob.txt');
      $response = $this->client->bulkUsers(
      [
        'items' => [
          [
            'data_type' => 'user',
            'method' => 'post', // can be 'delete'
            'data' => [
              'email' => 'pi@example.org',
              'name' => 'Pi'
            ]
          ]
        ]
      ]);

      $this->assertRequest('POST', '/bulk/users');
      $this->assertRequestJson(['items' => [['data_type' => 'user', 'method' => 'post', 'data' =>['email' => 'pi@example.org', 'name' => 'Pi']]]]);

      $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
      $this->assertEquals('job_5ca1ab1eca11ab1e', $response['id']);
    }

    public function testGetUserByID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->getUser(['id' => '123456']);

        $this->assertBasicAuth('my-app', '1234');
        $this->assertRequest('GET', '/users/123456');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response['name']);
    }

    public function testGetUserByEmail()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $this->client->getUser(['email' => 'a@example.org']);

        $this->assertRequest('GET', '/users/?email=a%40example.org');
    }

    public function testGetUserByUserID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $this->client->getUser(['user_id' => 'hgsdfhsasdfg']);

        $this->assertRequest('GET', '/users/?user_id=hgsdfhsasdfg');
    }

    public function testCreateUser()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->createUser(['name' => 'Joe Schmoe', 'email' => 'bob@example.com', 'hi' => 'hello', 'update_last_request_at' => true]);

        $this->assertRequest('POST', '/users');
        $this->assertRequestJson(['email' => 'bob@example.com', 'name' => 'Joe Schmoe', 'update_last_request_at' => true]);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response['name']);
        $this->assertEquals(1393613864, $response['signed_up_at']);
    }

    public function testUpdateUser()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->updateUser(['id' => '123456', 'user_id' => '1234', 'hi' => 'hello', 'new_session' => true]);

        $this->assertRequest('POST', '/users');
        $this->assertRequestJson(['id' => '123456', 'user_id' => '1234', 'new_session' => true]);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response['name']);
    }

    public function testDeleteUserByID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $response = $this->client->deleteUser(['id' => '123456', 'hi' => 'hello']);

        $this->assertRequest('DELETE', '/users');
        $this->assertRequestJson(['id' => '123456']);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Joe Schmoe', $response['name']);
    }

    public function testDeleteUserByEmail()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $this->client->deleteUser(['email' => 'bob@example.com', 'hi' => 'hello']);

        $this->assertRequest('DELETE', '/users');
        $this->assertRequestJson(['email' => 'bob@example.com']);
    }

    public function testDeleteUserByUserID()
    {
        $this->setMockResponse($this->client, 'User/User.txt');
        $this->client->deleteUser(['user_id' => '1234', 'hi' => 'hello']);

        $this->assertRequest('DELETE', '/users');
        $this->assertRequestJson(['user_id' => '1234']);
    }

    public function testGetUsers()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $response = $this->client->getUsers();
        $users = $response->get('users');

        $this->assertRequest('GET', '/users');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(3, count($users));
        $this->assertEquals('user1@example.com', $users['0']['email']);
        $this->assertEquals('user2@example.com', $users['1']['email']);
        $this->assertEquals('user3@example.com', $users['2']['email']);
    }

    public function testGetUsersByTagID()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getUsers(['tag_id' => '10', 'hello'=>'hi']);

        $this->assertRequest('GET', '/users?tag_id=10');
    }

    public function testGetUsersBySegmentID()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getUsers(['segment_id' => '20', 'hello'=>'hi']);

        $this->assertRequest('GET', '/users?segment_id=20');
    }

    public function testGetUsersByCreatedSince()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getUsers(['created_since' => '1', 'hello'=>'hi']);

        $this->assertRequest('GET', '/users?created_since=1');
    }

    public function testUpdateUserNoID()
    {
      $this->setMockResponse($this->client, 'User/User.txt');
      $response = $this->client->updateUser(['user_id' => '1234', 'hi' => 'hello', 'new_session' => true]);

      $this->assertRequest('POST', '/users');
      $this->assertRequestJson(['user_id' => '1234', 'new_session' => true]);
    }
}
