<?php

namespace Intercom;

use GuzzleHttp\Client;

abstract class IntercomRequest
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}
