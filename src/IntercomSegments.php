<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomSegments
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
     * Gets a single segment by ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-segment
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getSegment($id, array $options = [])
    {
        return $this->client->get('segments/' . $id, $options);
    }

    /**
     * Lists Segments.
     *
     * @see    https://developers.intercom.com/reference#list-segments
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getSegments($options = [])
    {
        return $this->client->get("segments", $options);
    }
}
