<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomMessages {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("messages", $options);
  }
}
