<?php

namespace Intercom\Legacy;

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

    /**
     * Returns $id as a single URL path segment.
     *
     * @param  string|int $id
     * @return string
     * @throws \InvalidArgumentException if the value is empty, "." or ".."
     */
    protected static function pathSegment($id)
    {
        $id = (string) $id;
        if ($id === "" || $id === "." || $id === "..") {
            throw new \InvalidArgumentException("Invalid ID for request path.");
        }
        return rawurlencode($id);
    }
}
