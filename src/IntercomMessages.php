<?php

namespace Intercom;

class IntercomMessages {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomMessages constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Creates Message.
   * @see https://developers.intercom.io/reference#conversations
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function create($options)
  {
    return $this->client->post("messages", $options);
  }
}
