<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomUsers {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("users", $options);
  }

  public function getUsers($options)
  {
    return $this->client->get("users", $options);
  }

  public function deleteUsers($options)
  {
    return $this->client->delete("users", $options);
  }
}
