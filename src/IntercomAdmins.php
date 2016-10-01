<?php

namespace Intercom;

class IntercomAdmins {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomAdmins constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Returns list of Admins.
   * @see https://developers.intercom.io/reference#list-admins
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getAdmins($options = [])
  {
    return $this->client->get("admins", $options);
  }
}
