<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomCounts extends IntercomResource
{
    /**
     * Returns list of Counts.
     *
     * @see    https://developers.intercom.io/reference#getting-counts
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getCounts($options = [])
    {
        return $this->client->get("counts", $options);
    }
}
