<?php

namespace Intercom;

class IntercomCompanies extends IntercomRequest
{
    public function create($options)
    {
        return $this->client->post("companies", $options);
    }

    public function getCompanies($options)
    {
        return $this->client->get("companies", $options);
    }
}
