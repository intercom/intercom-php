<?php

namespace Intercom;

class IntercomEvents extends IntercomRequest
{
    public function create(array $options)
    {
        return $this->client->post("events", $options);
    }

    public function getEvents(array $options)
    {
        return $this->client->get("events", array_merge(["type" => "user"], $options));
    }
}
