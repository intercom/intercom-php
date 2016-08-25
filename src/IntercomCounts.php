<?php

namespace Intercom;

class IntercomCounts extends IntercomRequest
{
    public function getCounts(array $options = [])
    {
        return $this->client->get("counts", $options);
    }
}
