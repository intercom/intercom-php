<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomTags {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function tag($options)
  {
    return $this->client->post("tags", $options);
  }

  public function getTags($options = [])
  {
    return $this->client->get("tags", $options);
  }
}
