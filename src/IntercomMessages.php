<?php

namespace Intercom;

use Http\Client\Exception;

class IntercomMessages
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomMessages constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Creates Message.
     *
     * @see    https://developers.intercom.io/reference#conversations
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("messages", $options);
    }
}
