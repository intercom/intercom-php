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

  public function getUser($id, $options = [])
  {
    $path = $this->userPath($id);
    return $this->client->get($path, $options);
  }

  public function deleteUser($id, $options = [])
  {
    $path = $this->userPath($id);
    return $this->client->delete($path, $options);
  }

  public function userPath($id)
  {
    return "users/" . $id;
  }
}
