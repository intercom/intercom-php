<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomBulk {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function users($options)
  {
    return $this->client->post("bulk/users", $options);
  }

  public function events($options)
  {
    return $this->client->post("bulk/events", $options);
  }
}
