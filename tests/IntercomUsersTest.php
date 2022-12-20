<?php

namespace Intercom\Test;

use Intercom\IntercomUsers;

class IntercomUsersTest extends TestCase
{
    public function testUserCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->create([]));
    }

    public function testUserUpdate()
    {
        $this->client->method('post')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->update([]));
    }

    public function testUserGet()
    {
        $this->client->method('get')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->getUsers([]));
    }

    public function testArchiveUser()
    {
        $this->client->method('delete')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->archiveUser(''));
    }

    public function testDeleteUser()
    {
        $this->client->method('delete')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->deleteUser(''));
    }

    public function testPermanentlyDeleteUser()
    {
        $this->client->method('post')->willReturn('foo');

        $users = new IntercomUsers($this->client);
        $this->assertSame('foo', $users->permanentlyDeleteUser(''));
    }
}
