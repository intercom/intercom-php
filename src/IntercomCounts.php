<?php

namespace Intercom;

class IntercomCounts {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomCounts constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Returns list of Counts.
   * @see https://developers.intercom.io/reference#getting-counts
   * @param array $options
   * @return mixed
   */
  public function getCounts($options = [])
  {
    return $this->client->get("counts", $options);
  }
}
