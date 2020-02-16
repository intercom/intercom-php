<?php

namespace Intercom;

abstract class IntercomResources
{
    /**
     * @var IntercomClient
     */
    protected $client;

    /**
     * IntercomBulk constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct(IntercomClient $client)
    {
        $this->client = $client;
    }
}
