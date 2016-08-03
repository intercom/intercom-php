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
  
  /**
  * Return a list of users
  * @see https://developers.intercom.io/reference#iterating-over-all-users
  * @param array $options if you didn't have scroll_param options must be null, else send an array with a key "scroll_param" with your scroll_param
  * @return mixed principally an stdClass
  * @throws \GuzzleHttp\Exception\GuzzleException
  */
  public function getUsersByScroll($options)
  {
    return $this->client->get("users/scroll", $options);
  }
}
