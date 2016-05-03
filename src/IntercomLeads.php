<?php

namespace Intercom;

use GuzzleHttp\Client;

class IntercomLeads {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function create($options)
  {
    return $this->client->post("contacts", $options);
  }

  public function getLeads($options)
  {
    return $this->client->get("contacts", $options);
  }

  public function getLead($id, $options = [])
  {
    $path = $this->leadPath($id);
    return $this->client->get($path, $options);
  }

  public function deleteLead($id, $options = [])
  {
    $path = $this->leadPath($id);
    return $this->client->delete($path, $options);
  }

  public function convertLead($options)
  {
    return $this->client->post("contacts/convert", $options);
  }

  public function leadPath($id)
  {
    return "contacts/" . $id;
  }
}
