<?php

namespace Intercom;

class IntercomEvents {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomEvents constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Creates Event.
   * @see https://developers.intercom.io/reference#submitting-events
   * @param array $options
   * @return mixed
   */
  public function create($options)
  {
    return $this->client->post("events", $options);
  }

  /**
   * Lists User Events.
   * @see https://developers.intercom.io/reference#list-user-events
   * @param array $options
   * @return mixed
   */
  public function getEvents($options)
  {
    return $this->client->get("events", array_merge(["type" => "user"], $options));
  }
}
