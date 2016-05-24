<?php

namespace Intercom;

class IntercomUsers {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomUsers constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Creates a User.
   * @see https://developers.intercom.io/reference#create-or-update-user
   * @param array $options
   * @return mixed
   */
  public function create($options)
  {
    return $this->client->post("users", $options);
  }

  /**
   * Lists Users.
   * @see https://developers.intercom.io/reference#list-users
   * @param array $options
   * @return mixed
   */
  public function getUsers($options)
  {
    return $this->client->get("users", $options);
  }
}
