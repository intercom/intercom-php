<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomBulk extends IntercomResource
{
    /**
     * Creates Users in bulk.
     *
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function users($options)
    {
        return $this->client->post("bulk/users", $options);
    }

    /**
     * Creates Events in bulk.
     *
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function events($options)
    {
        return $this->client->post("bulk/events", $options);
    }
}
