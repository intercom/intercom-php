<?php

namespace Intercom;

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
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Gets a single segment by ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-segment
     * @param  string $id
     * @param  array  $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSegments($options = [])
    {
        return $this->client->get("segments", $options);
    }
}
