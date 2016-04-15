<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomNotes {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("notes", $options);
  }

  public function getNotes($options)
  {
    return $this->client->get("notes", $options);
  }

  public function getNote($id)
  {
    return $this->client->get("notes/" . $id, []);
  }
}
