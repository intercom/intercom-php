<?php

namespace Intercom\Test;

use Intercom\IntercomTeams;

class IntercomTeamsTest extends TestCase
{
    public function testTeamsList()
    {
        $this->client->method('get')->willReturn('foo');

        $teams = new IntercomTeams($this->client);
        $this->assertSame('foo', $teams->getTeams());
    }

    public function testTeamsGet()
    {
        $this->client->method('get')->willReturn('foo');

        $teams = new IntercomTeams($this->client);
        $this->assertSame('foo', $teams->getTeam(1));
    }
}
