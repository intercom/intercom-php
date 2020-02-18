<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomEvents extends IntercomResource
{
    /**
     * Creates Event.
     *
     * @see    https://developers.intercom.io/reference#submitting-events
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("events", $options);
    }

    /**
     * Lists User Events.
     *
     * @see    https://developers.intercom.io/reference#list-user-events
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getEvents($options)
    {
        return $this->client->get("events", array_merge(["type" => "user"], $options));
    }
}
