<?php

namespace Intercom;

class IntercomMessages extends IntercomRequest
{
    public function create(array $options)
    {
        return $this->client->post("messages", $options);
    }
}
