<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomCounts {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function getCounts($options = [])
  {
    return $this->client->get("counts", $options);
  }
}
