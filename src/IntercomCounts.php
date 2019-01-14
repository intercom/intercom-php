<?php

namespace Intercom;

use Http\Client\Exception;

class IntercomCounts
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomCounts constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

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
