<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomMessages extends IntercomResource
{
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
