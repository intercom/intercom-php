<?php

namespace Intercom;

class IntercomTags extends IntercomRequest
{
    public function tag(array $options)
    {
        return $this->client->post("tags", $options);
    }

    public function getTags(array $options = [])
    {
        return $this->client->get("tags", $options);
    }
}
