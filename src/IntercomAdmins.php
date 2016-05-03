<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomAdmins {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function getAdmins($options = [])
  {
    return $this->client->get("admins", $options);
  }
}
