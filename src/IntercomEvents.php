<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomEvents {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("events", $options);
  }

  public function getEvents($options)
  {
    return $this->client->get("events", array_merge(["type" => "user"], $options));
  }
}
