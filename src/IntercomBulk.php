<?php

namespace Intercom;

class IntercomBulk extends IntercomRequest
{
    public function users(array $options)
    {
        return $this->client->post("bulk/users", $options);
    }

    public function events(array $options)
    {
        return $this->client->post("bulk/events", $options);
    }
}
