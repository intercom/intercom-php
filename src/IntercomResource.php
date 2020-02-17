<?php

namespace Intercom;

abstract class IntercomResource
{
    /**
     * @var IntercomClient
     */
    protected $client;

    /**
     * IntercomResource constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct(IntercomClient $client)
    {
        $this->client = $client;
    }
}
