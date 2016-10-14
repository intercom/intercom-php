<?php

namespace Intercom;

class IntercomSegments {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomTags constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Lists Segments.
   * @see https://developers.intercom.com/reference#list-segments
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getSegments($options = [])
  {
    return $this->client->get("segments", $options);
  }
}
