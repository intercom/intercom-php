<?php

namespace Intercom;

class IntercomAdmins extends IntercomRequest
{
    public function getAdmins(array $options = [])
    {
        return $this->client->get("admins", $options);
    }
}
