<?php

namespace Intercom;

class NoteTest extends IntercomTestCase
{
    public function testGetNote()
    {
        $this->setMockResponse($this->client, 'Note/Note.txt');
        $response = $this->client->getNote(['id' => '123456']);

        $this->assertBasicAuth('my-app', '1234');
        $this->assertRequest('GET', '/notes/123456');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Jayne Cobb', $response['author']['name']);
    }

    public function testGetNotesForUserByID()
    {
        $this->setMockResponse($this->client, 'Note/NoteList.txt');
        $response = $this->client->getNotesForUser(['id' => '1234']);
        $notes = $response->get('notes');

        $this->assertRequest('GET', '/notes?id=1234');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(2, count($notes));
        $this->assertEquals('Jayne Cobb', $notes['0']['author']['name']);
        $this->assertEquals('<p>Text for my note</p>', $notes['1']['body']);
    }

    public function testGetNotesForUserByUserID()
    {
        $this->setMockResponse($this->client, 'Note/NoteList.txt');
        $this->client->getNotesForUser(['user_id' => 'aabb']);

        $this->assertRequest('GET', '/notes?user_id=aabb');
    }

    public function testGetNotesForUserByEmail()
    {
        $this->setMockResponse($this->client, 'Note/NoteList.txt');
        $this->client->getNotesForUser(['email' => 'bob@example.org']);

        $this->assertRequest('GET', '/notes?email=bob%40example.org');
    }

    public function testCreateNote()
    {
        $this->setMockResponse($this->client, 'Note/Note.txt');
        $this->client->createNote(['admin_id' => '6', 'user' => ['email' => 'bob@example.org'], 'body' => 'Hi']);

        $this->assertRequest('POST', '/notes');
        $this->assertRequestJson(['admin_id' => '6', 'user' => ['email' => 'bob@example.org'], 'body' => 'Hi']);
    }

    public function testCreateNoteWithoutAdmin() {
      $this->setMockResponse($this->client, 'Note/Note.txt');
      $this->client->createNote(['user' => ['email' => 'bob@example.org'], 'body' => 'Hi']);

      $this->assertRequest('POST', '/notes');
      $this->assertRequestJson(['user' => ['email' => 'bob@example.org'], 'body' => 'Hi']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testGetNoteNoID()
    {
        $this->client->getNote();
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateNoteNoArguments()
    {
        $this->client->getNote();
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateNoteNoAdminID()
    {
        $this->client->getNote(['user' => ['email' => 'bob@example.org'], 'body' => 'Hi']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateNoteNoUser()
    {
        $this->client->getNote(['admin_id' => '6', 'body' => 'Hi']);
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateNoteNoBody()
    {
        $this->client->getNote(['admin_id' => '6', 'user' => ['email' => 'bob@example.org']]);
    }
}
