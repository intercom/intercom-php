<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomCompanies {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("companies", $options);
  }

  public function getCompanies($options)
  {
    return $this->client->get("companies", $options);
  }
}
