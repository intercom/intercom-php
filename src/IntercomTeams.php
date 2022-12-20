<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomTeams extends IntercomResource
{
    /**
     * Returns list of Teams.
     *
     * @see    https://developers.intercom.io/reference#list-teams
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getTeams($options = [])
    {
        return $this->client->get("teams", $options);
    }

    /**
     * Gets a single Team based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-team
     * @param  integer $id
     * @param  array   $options
     * @return stdClass
     * @throws Exception
     */
    public function getTeam($id, $options = [])
    {
        $path = $this->teamPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Returns endpoint path to Team with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function teamPath($id)
    {
        return 'teams/' . $id;
    }
}
