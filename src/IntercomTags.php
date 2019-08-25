<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomTags
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomTags constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct(IntercomClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a Tag.
     *
     * @see    https://developers.intercom.io/reference#create-and-update-tags
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function tag($options)
    {
        return $this->client->post("tags", $options);
    }

    /**
     * Lists Tags.
     *
     * @see    https://developers.intercom.io/reference#list-tags-for-an-app
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getTags($options = [])
    {
        return $this->client->get("tags", $options);
    }
}
